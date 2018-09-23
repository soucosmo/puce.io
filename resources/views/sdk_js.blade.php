<script type="text/javascript" src="{{ asset('downloads/puce.js') }}"></script>

<script type="text/javascript">
	Puce = new Puce('D12EDDDD7DF0192EEC538DD8140C38468A6F8D52');

//	var data = {'name' : 'ABC'};

	document.write(
		Puce.withdrawal_test('btc', 10, 'cosmoasdasddasom', '123456', 'http://site.com'));

</script>