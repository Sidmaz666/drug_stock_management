<?php

session_start();

error_reporting(0);
require_once 'db_con.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/style.css">
	<title> Admin Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php

$uid_err = $pass_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty(trim($_POST['username']))) {
		$uid_err = "<span class='p-2 font-semibold text-sm text-red-500'>Username Required!</span>";
	} else {
		$uid = trim($_POST['username']);
	}
	if (empty(trim($_POST['pass']))) {
		$pass_err = "<span class='p-2 font-semibold text-sm text-red-500'>Password Required!</span>";
	} else {
		$pass =  MD5(trim($_POST['pass']));
	}
	//Done Validating
	if (empty($uid_err) && empty($pass_err)) {

		$uid_check_query = "select * from admin where username = '$uid' && password = '$pass'";
		$check_uid = mysqli_query($db_connection, $uid_check_query);
		$match = mysqli_num_rows($check_uid);

		if ($match > 0) {
			$_SESSION["user"] = $uid;
			header('location: index.php');
		} else {
			$uid_err = "<span class='p-2 text-red-500 font-semibold text-sm'>Invalid Username or Password!</span>";
		}
	}
}


if ($_GET['action'] == "logout") {
	$uid_err = $pass_err = "";
	session_start();
	session_destroy();
	$_SESSION = array();
}


if (isset($_SESSION['user'])) {

	$msg = "";
	if (isset($_POST['new_record'])) {
		$drug = str_replace("'", '', $_POST['drug']);
		$category = $_POST['category'];
		$imported_from = $_POST['imported_from'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$date = $_POST['date'];

		if (empty($imported_from)) {
			$imported_from = 'none';
		}

		$update_drug_q = "INSERT INTO `products` (drug,imported_from,category,quantity,price,date) VALUES ('$drug','$imported_from','$category','$quantity','$price','$date')";

		$runupdate = mysqli_query($db_connection, $update_drug_q);
		if ($runupdate) {
			$msg = "<span class='pb-2'>New Record Added Successfully!</span>";
		} else {
			$msg = "<span class='pb-2'>Unable to add new record!</span>";
		}
	}

?>
	<script defer>
		document.title = "Manage Stock - <?= $_SESSION['user'] ?> "
	</script>

	<body class="">

		<form class="flex justify-between items-center p-2 shadow">
			<button class="text-lg uppercase font-semibold text-gray-700 cursor-pointer" onclick="window.location = 'index.php'">
				 Manage Stock
			</button>
			<a class="p-2 bg-gray-900 text-md focus:outline-none text-white rounded" href="index.php?action=logout">Logout?</a>
		</form>
		<br>
		<div class="pl-5 pr-5">
			<?= $msg; ?>
			<span class="text-3xl flex text-gray-700">
				<button class="font-semibold" onclick="document.getElementById('stock_form').classList.toggle('hidden');">▼ Insert New Stock </button>
			</span>

			<div id="stock_form" class="pl-8 pr-8 p-5 flex flex-col hidden">


				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="drug">
							Drug
						</label>
						<input class="shadow appearance-none border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="drug" type="text" placeholder="Medicine Name" name="drug" minlength="3" required>
					</div>

					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="imported_from">
							Imported From
						</label>
						<input class="shadow appearance-none border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="imported_from" type="text" placeholder="Import Location" minlength="2" name="imported_from" required>
					</div>

					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="category">
							Category
						</label>
						<select class="shadow border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none bg-white focus:shadow-outline" id="category" name="category">
							<option value="lozenges" selected>Lozenges</option>
							<option value="cleaning">Cleaning & Surface Disinfectants</option>
							<option value="hand_wash">Hand Wash & Sanetizer</option>
							<option value="multivitamins">Multivitamins And Multiminerals</option>
							<option value="immunity_boosters">Immunity Boosters</option>
							<option value="chyawanprash">Chyawanprash</option>
							<option value="covid_test_kit">Covid Test Kits</option>
							<option value="steam_vaporizer">Steam Vaporizer</option>
							<option value="pulse_oximeters">Pulse Oximeters</option>
							<option value="thermometer">Thermometers</option>
							<option value="gloves">Gloves</option>
							<option value="face_mask">Face Mask</option>
							<option value="covid_essentials">Covid Essentials</option>
							<option value="pain_relief">Pain Relif</option>
							<option value="wound_care">Wound Care</option>
						</select>
					</div>


					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="quantity">
							Quantity
						</label>
						<input class="shadow appearance-none border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="quantity" type="number" placeholder="Quantity" name="quantity" minlength="1" required>
					</div>


					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="price">
							Selling Price
						</label>
						<input class="shadow appearance-none border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="price" type="number" placeholder="Amount" name="price" minlength="1" required>
					</div>

					<div class="mb-4">
						<label class="block text-gray-700 text-xl font-bold mb-2" for="date">
							Date
						</label>
						<input class="shadow appearance-none border rounded w-40 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date" type="date" placeholder="Date" name="date" required>
					</div>

					<button class="bg-gray-900 hover:bg-gray-800 text-white w-40 mt-2 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="new_record">
						Submit
					</button>
				</form>


			</div>






			<span class="text-3xl flex text-gray-700 ">
				<button class="font-semibold" onclick="document.getElementById('all_stocks').classList.toggle('hidden')">▼ Edit Stock Details </button>
			</span>



			<div id="all_stocks" class="pl-8 pr-8 p-5 flex overflow-x-auto">
				<table class="w-full">
					<tr class="font-semibold">
						<td class="border p-2">Medicine</td>
						<td class="border p-2">Category</td>
						<td class="border p-2">Imported From</td>
						<td class="border p-2">Quantity</td>
						<td class="border p-2">Selling Price</td>
						<td class="border p-2">Date</td>
						<td class="border p-2">Sold</td>
						<td class="border p-2">Options</td>
					</tr>

					<?php
					$up_er = '';
					if ($_GET['action'] == "update") {
						$gid = $_GET['id'];
						$gval = $_GET['value'];
						$update_rec = "UPDATE `products` SET `quantity`='$gval' WHERE `ID` = $gid";
						$runq = mysqli_query($db_connection, $update_rec);
						if (!$runq) {
							$up_er = "border-red-500";
						}
					}

					if ($_GET['action'] == "sold") {
						$gid = $_GET['id'];
						$gval = $_GET['value'];
						$update_rec = "UPDATE `products` SET `sold`='$gval' WHERE `ID` = $gid";
						$runq = mysqli_query($db_connection, $update_rec);
						if (!$runq) {
							$up_er = "border-red-500";
						}
					}
					$del_er = '';
					if ($_GET['action'] == "delete") {
						$gid = $_GET['id'];
						$del_q = "DELETE FROM products WHERE `products`.`ID` = $gid";
						$run_dq = mysqli_query($db_connection, $del_q);
						if (!$run_dq) {
							$del_er = "border-red-500";
						}
					}

					$get_stock = "SELECT * FROM `products` ORDER BY date ASC";
					$run_query = mysqli_query($db_connection, $get_stock);
					$total_stock = mysqli_num_rows($run_query);
					if ($total_stock > 0) {
						while ($product = mysqli_fetch_assoc($run_query)) {

					?>


							<tr>
								<td class="border p-2 capitalize">
									<?= $product['drug']; ?>
								</td>
								<td class="border p-2 capitalize">
									<?= $product['category']; ?>
								</td>
								<td class="border p-2 capitalize">
									<?= $product['imported_from']; ?>
								</td>
								<td class="border p-2">
									<script defer>
										function update(val, id) {
											window.location = "index.php?action=update&id=" + id + "&value=" + val
										}

										function sold(val, id) {
											window.location = "index.php?action=sold&id=" + id + "&value=" + val
										}
										function remove(id) {
											window.location = "index.php?action=delete&id=" + id
										}
									</script>
									<input type="number" id="quantity_<?= $product['ID']; ?>" value="<?= $product['quantity']; ?>" class="p-2 w-20 <?= $up_er; ?>">
									<button onclick="update(document.getElementById('quantity_<?= $product['ID']; ?>').value,<?= $product['ID']; ?>)" class="font-semibold bg-gray-900 border text-white shadow mt-2 rounded-full pl-2 pr-2">Save</button>
								</td>
								<td class="border p-2"><?= $product['price'] . 'RS/per'; ?></td>
								<td class="border p-2"><?= $product['date']; ?></td>
								<td class="border p-2">

					  <input type="number" id="sold_<?= $product['ID']; ?>" value="<?= $product['sold']; ?>" class="p-2 w-20 <?= $up_er; ?>">
					  <button onclick="sold(document.getElementById('sold_<?= $product['ID']; ?>').value,<?= $product['ID']; ?>)" class="font-semibold bg-gray-900 border text-white shadow mt-2 rounded-full pl-2 pr-2">Save</button>



</td>
								<td class="border p-2">
									<button onclick="remove(<?= $product['ID']; ?>)" class="<?= $del_er; ?> font-semibold border border-gray-400 shadow rounded-full pl-2 pr-2 mb-2">Remove</button>
								</td>

							</tr>

					<?php
						}
					}


					?>


				</table>
			</div>


			<?php

			if ($_GET['action'] == "remove_bill") {
				$id = $_GET['id'];
				$del_q = "DELETE FROM bills WHERE `bills`.`ID` = $id";
				$run_dq = mysqli_query($db_connection, $del_q);
				if (!$run_dq) {
					echo "Unable To Delete The Bill";
				}
			}

			if ($_GET['action'] == "billing") {
				$amt = $_GET['amount'];
				$month = $_GET['month'];
				$year = $_GET['year'];
				$sell = $_GET['sell'];


				$get_bill = "SELECT * FROM `bills` WHERE `month` = '$month' AND `year` = '$year'";
				$run_query = mysqli_query($db_connection, $get_bill);
				$total_bills = mysqli_num_rows($run_query);
				if ($total_bills > 0) {
					echo "Bill is Already Saved!";
				} else {

					$bill_q = "INSERT INTO bills (total_amount,month,year,sell_amt) VALUES ('$amt','$month','$year','$sell')";
					$run_billq = mysqli_query($db_connection, $bill_q);

					if (!$run_billq) {
						echo "Unable To save Bill!";
					}
				}
			}

			?>


			<span class="text-3xl flex text-gray-700 ">
				<button class="font-semibold" onclick="document.getElementById('bills').classList.toggle('hidden')">▼ Billing </button>
			</span>



			<div id="bills" class="pl-8 pr-8 p-5 flex overflow-x-auto">
				<table class="w-full">
					<tr class="font-semibold">
						<td class="border p-2">Month</td>
						<td class="border p-2">Stock Cost (95% of Price)</td>
						<td class="border p-2">Selled Amount</td>
						<td class="border p-2">Date-Time</td>
						<td class="border p-2">Options</td>
					</tr>
					<?php



					$gen_bill = "SELECT MONTHNAME(date) as month, sum(quantity*((price*95)/100)) as total_amount, sum(sold*price) as selled_amt, YEAR(date) as year FROM `products` GROUP BY MONTH(date);";
					$result = $db_connection->query($gen_bill);

					while ($row = $result->fetch_object()) :
						$gen_month = $row->month;
						$gen_amount = $row->total_amount;
						$gen_year =  $row->year;
						$gen_sell = $row->selled_amt;

						$get_bill = "SELECT * FROM `bills` WHERE `month` = '$gen_month' AND `year` = '$gen_year'";
						$run_query = mysqli_query($db_connection, $get_bill);
						$total_bills = mysqli_num_rows($run_query);
						if ($total_bills > 0) {
							while ($bill = mysqli_fetch_assoc($run_query)) {
					?>
								<script defer>
									function removebill(id) {
										const url = new URL(window.location.href.split('/index.php')[0] + "/index.php?action=remove_bill&id=" + id)
										window.location = url
									}
								</script>

								<tr>
									<td class="border p-2"><?= $bill['month']; ?></td>
									<td class="border p-2"><?= $bill['total_amount'] . " RS"; ?></td>
									<td class="border p-2"><?= $bill['sell_amt'] . " RS"; ?></td>
									<td class="border p-2"><?= $bill['creation_time']; ?></td>
									<td class="border p-2">
										<button onclick="removebill('<?= $bill['ID']; ?>')" class="font-semibold bg-gray-900 text-white shadow rounded-full pl-2 pr-2 mb-2">Remove Bill</button>

									</td>
								</tr>


							<?php }
						} else {  ?>

							<script defer>
								function setbill(month, year, amount,sell) {
									const url = new URL(window.location.href.split('/index.php')[0] + "/index.php?action=billing&amount=" + amount + "&month=" + month + "&year=" + year + "&sell=" + sell)
									window.location = url
								}
							</script>



							<tr>
								<td class="border p-2"><?= $gen_month; ?></td>
								<td class="border p-2"><?= $gen_amount . " RS"; ?></td>
								<td class="border p-2"><?= $gen_sell . " RS"; ?></td>
								<td class="border p-2"><?= '<i>Year</i>: ' . $gen_year; ?></td>
								<td class="border p-2">
									<button onclick="setbill('<?= $gen_month; ?>','<?= $gen_year; ?>','<?= $gen_amount; ?>','<?=$gen_sell;?>')" class="font-semibold border border-gray-400 shadow rounded-full pl-2 pr-2 mb-2">Save Bill</button>

								</td>
							</tr>







					<?php }
					endwhile;  ?>

				</table>
			</div>

			<span class="text-3xl flex text-gray-700 ">
				<button class="font-semibold" onclick="document.getElementById('pflo').classList.toggle('hidden')">▼ Profit/Loss </button>
			</span>



			<div id="pflo" class="pl-8 pr-8 p-5 flex overflow-x-auto">
				<table class="w-full">
					<tr class="font-semibold">
						<td class="border p-2">Month</td>
						<td class="border p-2">Profit</td>
					</tr>
		<?php
		
						$get_bill = "SELECT * FROM `bills`";
						$run_query = mysqli_query($db_connection, $get_bill);
						$total_bills = mysqli_num_rows($run_query);
						if ($total_bills > 0) {
							  while ($bill = mysqli_fetch_assoc($run_query)) {
							    $sell_amt = $bill['sell_amt'];
							    $stock_amt =  $bill['total_amount'];
							    $month = $bill['month'];
		  ?>

						<td class="border p-2"><?=$month?></td>
						<td class="border p-2">
						<?php
							    if($stock_amt > $sell_amt){
							      echo "<b>".round((($stock_amt-$sell_amt)/$stock_amt)*100,0) . "%</b> Loss <i>".$stock_amt-$sell_amt."RS </i>";
							    }	elseif($sell_amt > $stock_amt){
							      echo "<b> ".round((($sell_amt-$stock_amt)/$stock_amt)*100,0) . "%</b> Profit <i>".$sell_amt-$stock_amt."RS </i>";
							    } else {
							      echo "Cost Recovered";
							    }
						?> 
						</td>
					      </tr>

<?php }} ?>
			
		</div>
		</div>
		</div>



	<?php } else {
	echo $uid_err;
	echo $pass_err;
	?>

		<body class="w-full h-screen flex flex-col justify-center items-center">

			<div class="p-2">
				<span class="flex justify-center text-xl font-semibold font-serif text-white p-2 rounded rounded-b-none bg-gray-900">
					<span class="">Admin Login</span>
				</span>

				<div class="w-full max-w-xs">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
						<div class="mb-4">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="username">
								Username
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username" name="username" minlength="3" required>
						</div>
						<div class="mb-6">
							<label class="block text-gray-700 text-sm font-bold mb-2" for="password">
								Password
							</label>
							<input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-2 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="******************" name="pass" minlength="8" required>
						</div>
						<div class="flex items-center justify-center">
							<button class="bg-gray-900 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
								Sign In
							</button>
						</div>
					</form>
					<p class="text-center text-gray-500 text-xs">
						&copy;2020 All rights reserved.
					</p>
				</div>
			</div>

		<?php } ?>


		<script type="text/javascript" defer>
			document.addEventListener("DOMContentLoaded", function(event) {
			  if(document.querySelector('.disclaimer')){
				document.querySelector('.disclaimer').style.display = "none"
			  }
			});
		</script>
		</body>

</html>
