@include('../header')
<div id="container-padding">
</div>
<style>
#shop-welcome{

}
#shop-welcome p{
	max-width:700px;
	margin-bottom:10px;
}

#shop-item-container
{
	
}

#shop-item-container .item-box #item-header
{
	height:50px;
	background-color:rgb(139, 134, 134)
	
}
#shop-item-container .item-box #item-header .item-info
{
	line-height:45px;
	font-size:16px;
}
#shop-item-container .item-box
{
	width:100%;
	height:auto;
	border: solid 1px #ccc;
	margin-bottom:20px;
}

#shop-item-container .item-box .item-wrapper
{
	padding:10px 0;
	border-bottom: dotted 1px #ccc;
}
#shop-item-container .item-box .item-wrapper .items
{
	line-height:35px;
}

.addminus
{
	font-size:11px;
}
.quantity
{
	max-width:35px;
	display:inline-block;
}
</style>
<div class="container" id="main-container">
	<div id="shop-welcome">
		<h1>MU Philippines Online Shopping</h1>
		<p>Mu Philippines is a free to play MMORPG. But in case you want to purchases coins and some items, you may use this page.</p>
		<p>All payments will be used in maintaining our server such as electricity, internet connection, dedicated server payments, GMs and administrator payments (ofcourse we got bills to pay).</p>
		<p>All payments are non refundable and you agree to our terms and services</p>
	</div>
	
	<div id="shop-item-container">
		<div class="item-box">
			<div class="row" id="item-header">
				<div class="col-md-2 item-info">Product Name</div>
				<div class="col-md-4 item-info">Product Description</div>
				<div class="col-md-2 item-info">Price</div>
				<div class="col-md-2 item-info">Quantity</div>
				<div class="col-md-1 item-info">Total</div>
				<div class="col-md-1 item-info">Add/Remove</div>
			</div>
			<div class="row item-wrapper" id="starter-kit">
				<div class="col-md-2 items">WCoin Starter Kit</div>
				<div class="col-md-4 items">Starking kit package consist of 300WcoinP and 1000WCoinC</div>
				<div class="col-md-2 items">300 PHP</div>
				<div class="col-md-2 items">
					<input class="form-control quantity" type="text" value="1"> 
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-plus addminus addme">&nbsp;</span></a>
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-minus addminus minusme">&nbsp;</span></a>
				</div>
				<div class="col-md-1 items">300 PHP</div>
				<div class="col-md-1 buttons"><button class="btn btn-primary">Add</button></div>
			</div>
			<div class="row item-wrapper" id="starter-elite">
				<div class="col-md-2 items">WCoin Starter Kit Elite</div>
				<div class="col-md-4 items">Starking kit elite package consist of 500WcoinP and 2000WCoinC</div>
				<div class="col-md-2 items">500 PHP</div>
				<div class="col-md-2 items">
					<input class="form-control quantity" type="text" value="1"> 
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-plus addminus addme">&nbsp;</span></a>
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-minus addminus minusme">&nbsp;</span></a>
				</div>
				<div class="col-md-1 items">500 PHP</div>
				<div class="col-md-1"><button class="btn btn-primary buttons">Add</button></div>
			</div>
			<div class="row item-wrapper" id="starter-premium">
				<div class="col-md-2 items">WCoin Starter Kit Premium</div>
				<div class="col-md-4 items">Starking kit elite package consist of 1000WcoinP and 5000WCoinC</div>
				<div class="col-md-2 items">500 PHP</div>
				<div class="col-md-2 items">
					<input class="form-control quantity" type="text" value="1"> 
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-plus addminus addme">&nbsp;</span></a>
					<a href="javascript:void(0)"><span class="glyphicon glyphicon-minus addminus minusme">&nbsp;</span></a>
				</div>
				<div class="col-md-1 items">1000 PHP</div>
				<div class="col-md-1"><button class="btn btn-primary buttons">Add</button></div>
			</div>
			<div class="row item-wrapper">
				<div class="col-md-2 items">Stack of Jewels of Bless</div>
				<div class="col-md-4 items">30 Pieces Jewels of Bless</div>
				<div class="col-md-2 items">200 PHP</div>
				<div class="col-md-2 items">1</div>
				<div class="col-md-1 items">200 PHP</div>
				<div class="col-md-1 items">Soon!</div>
			</div>
			<div class="row item-wrapper">
				<div class="col-md-2 items">Stack of Jewels of Soul</div>
				<div class="col-md-4 items">30 Pieces Jewels of Souls</div>
				<div class="col-md-2 items">100 PHP</div>
				<div class="col-md-2 items">1</div>
				<div class="col-md-1 items">100 PHP</div>
				<div class="col-md-1 items">Soon!</div>
			</div>
			<div class="row item-wrapper">
				<div class="col-md-2 items">Stack of Jewels of Chaos</div>
				<div class="col-md-4 items">30 Pieces Jewels of Chaos</div>
				<div class="col-md-2 items">300 PHP</div>
				<div class="col-md-2 items">1</div>
				<div class="col-md-1 items">300 PHP</div>
				<div class="col-md-1 items">Soon!</div>
			</div>
			<div class="row item-wrapper">
				<div class="col-md-2 items">Stack of Jewels of Life</div>
				<div class="col-md-4 items">30 Pieces Jewels of Life</div>
				<div class="col-md-2 items">400 PHP</div>
				<div class="col-md-2 items">1</div>
				<div class="col-md-1 items">400 PHP</div>
				<div class="col-md-1 items">Soon!</div>
			</div>
			<div class="row item-wrapper">
				<div class="col-md-2 items">Stack of Jewels of Harmony</div>
				<div class="col-md-4 items">30 Pieces Jewels of Harmony</div>
				<div class="col-md-2 items">400 PHP</div>
				<div class="col-md-2 items">1</div>
				<div class="col-md-1 items">400 PHP</div>
				<div class="col-md-1 items">Soon!</div>
			</div>
			<div style="max-width:150px; text-align:right;margin:20px; float:right">
				<p>Checkout With</p>
				<a href=""><img src="http://beta.cambridgesdachurch.co.uk/wp-content/uploads/2014/06/paypal-donate-21.png?w=300" style="width:100%"></a>
			</div>
			<div style="clear:both"></div>
		</div>
	</div>
</div>

<script>
$(function(){
	//add
	$(document).on('click', '.addme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		$('#'+itemid +'  .quantity').val(parseInt(currentquantity) + 1);
		console.log(itemid);
	});
	//minus
	$(document).on('click', '.minusme', function(){
		items = $(this);
		var itemid = items.parent().parent().parent().attr('id');
		var currentquantity = $('#'+itemid +'  .quantity').val();
		if(currentquantity >=1){
			$('#'+itemid +'  .quantity').val(parseInt(currentquantity) - 1);
		}
		console.log(itemid);
	});
	
	
	
});
</script>