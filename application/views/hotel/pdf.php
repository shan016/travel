
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Example 1</title>
    <style>
      .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 100%;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 150px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 80px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}  
    </style>
     
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents($this->config->config['asset_url'].'assets/img/logo.png')); ?>" alt="Image">
      </div>
      <h1>Booking Confirmation</h1>
      
    </header>
    <main>
        <h3>Order Details</h3>
      <table>
        <tbody>
          <tr>
            <td class="service">Order Invoice</td>
            <td class="desc">#<?= $booking_ref ?></td>
          </tr>
          <tr>
            <td class="service">Date</td>
            <td class="desc"><?= date('d M Y', strtotime($date_booking)) ?></td>
          </tr>
          <tr>
            <td class="service">Total Amount</td>
            <td class="desc">YEM<?= $amount ?></td>
          </tr>
          <tr>
            <td class="service">Payment Mode</td>
            <td class="desc"><?= $payment_type ?></td>
          </tr>
          
        </tbody>
      </table>
        
        <h3>Guest Details</h3>
      <table>
        <tbody>
          <tr>
            <td class="service">Full Name</td>
            <td class="desc"><?= $guest_name ?></td>
          </tr>
          <tr>
            <td class="service">Phone</td>
            <td class="desc"><?= $guest_tel ?></td>
          </tr>
          <tr>
            <td class="service">Email</td>
            <td class="desc"><?= $guest_email ?></td>
          </tr>
          
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>