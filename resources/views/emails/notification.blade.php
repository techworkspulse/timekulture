<html>
<body>
<table border="1">
	<tr>
		@php($days = array("2018-07-11", "2018-07-12", "2018-07-13", "2018-07-14", "2018-07-15", "2018-07-16", "2018-07-17", "2018-07-18", "2018-07-19", "2018-07-20"))
		@if ($data['daily'] == $days[0])
			<th>Day 1: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[1])
			<th>Day 2: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[2])
			<th>Day 3: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[3])
			<th>Day 4: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[4])
			<th>Day 5: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[5])
			<th>Day 6: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[6])
			<th>Day 7: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[7])
			<th>Day 8: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[8])
			<th>Day 9: <?php echo $data['daily']; ?></th>
		@elseif ($data['daily'] == $days[9])
			<th>Day 10: <?php echo $data['daily']; ?></th>
		@endif
		<th>Digital Unique Code</th>
		<th>Full Name</th>
		<th>Proof of Identification (IC / ID number)</th>
		<th>Winner signature</th>
		<th>SWG voucher no. </th>
		<th>SWG staff signature</th>
	</tr>
	@php($count = 1)
	@foreach($data['winners'] as $item)
		<tr>
			<th>{{ $count }}</th>
			<th>{{ $item['guid'] }}</th>
			<th>{{ $item['name'] }}</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
			<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
		</tr>
		@php($count = $count + 1)
	@endforeach
</table>
</body>
</html>