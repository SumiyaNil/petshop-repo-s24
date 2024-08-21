<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
    <style>
        body{margin-top:20px;}

    </style>
<table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: #f6f6f6; margin: 0;">
    <tbody>
        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
            <td class="container" width="600" valign="top">
                <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; background-color: #fff; margin: 0; border: 1px solid #e9e9e9;">
                        <tbody>
                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="" valign="top">
                                    <a href="#"> Minu's pet shop</a> <br>
                                    <span>Welcome to our Shop</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="content-wrap" valign="top">
                                    <table width="100%" cellpadding="0" cellspacing="0">
                                        <tbody>
                                            <tr>
                                                <td class="content-block" valign="top">
                                                <p>Order Number: {{$customerOrder->id}} </p>
                                                <p>Total Amount: {{$customerOrder->total_amount}}</p>
                                                <p>Status: {{$customerOrder->payment_status}}</p>
                                                <p>Receiver Name: {{$customerOrder->receiver_name}}</p>

                                                </td>
                                            </tr>
                                            
                                            <tr >
                                                <td class="content-block"  valign="top">
                                                    <a href="#" class="btn-primary" >View your Profile</a>
                                                
                                                </td>
                                            </tr>
                                           <tr>
                                            <td class="content-block " valign="top">Thank you for shopping with us</td>
                                           </tr>
                                       
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </td>
            </tr>
    </tbody>
</table>

</body>
</html>