<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mail;

class GeneralModel extends Model
{
    function array_to_object($array) {
	    return (object) $array;
	}

	function object_to_array($object) {
	    return (array) $object;
	}

	function return_ajax_error($status, $message = null){
        $result = array(
                'status' => $status,
                'message' => $message
            );
        return $result;
    }

    function sentEmailNotification($data, $template='emails.thankyou'){
        try {
            $result = Mail::send($template, ['data' => $data], function ($message) use ($data){
                $message->from($data['fromEmail'], $data['fromName']);
                $message->to($data['toEmail'], $data['toName']);
                $message->replyTo($data['fromEmail'], $data['fromName']);
                $message->subject($data['intromessage']);
                $message->getSwiftMessage();

            });
        } catch (Exception $e) {
            if( count(Mail::failures()) > 0 ) {

               $result = "There was one or more failures. They were: <br />";

               foreach(Mail::failures as $email_address) {
                   $result .=  " - $email_address";
                }

            } else {
                $result =  "No errors, all sent successfully!";
            }
        }


        return $result;
    }

    function sentEmailNotificationWithAttachment($data, $template='emails.index'){
        try {
            $result = Mail::send($template, ['data' => $data], function ($message) use ($data){
                $message->from($data['fromEmail'], $data['fromName']);
                $message->to($data['toEmail'], $data['toName']);
                $bookingID=$data['booking']->bookingID;
                $message->attach(storage_path(''.$bookingID.'.pdf')
                            );
                $message->replyTo($data['fromEmail'], $data['fromName']);
                $message->subject($data['subject']);
                $message->getSwiftMessage();

            });
        } catch (Exception $e) {
            if( count(Mail::failures()) > 0 ) {

               $result = "There was one or more failures. They were: <br />";

               foreach(Mail::failures as $email_address) {
                   $result .=  " - $email_address";
                }

            } else {
                $result =  "No errors, all sent successfully!";
            }
        }


        return $result;
    }


    function logger($log, $fileName) {
        if ($log) {
            file_put_contents($fileName, $log . "\n", FILE_APPEND);
        }
    }
}
