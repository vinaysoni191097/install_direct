<?php

namespace Database\Seeders;

use App\Models\EmailTemplate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('email_templates')->delete();
        $templates = [
            [
                'template_used_for' => 1,
                'subject' => 'Welcome to Installs Direct - Your Solar Future Begins!',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADkAAAA5CAYAAACMGIOFAAAC60lEQVR4AeWai3HiMBCGF+YKIBWcroLjKoBUcOng5irgOsAdkA5MKmCugtABpAI7FUAHm92RPXiMVn5Ifsh8MzsEvdCftSRrJYAeQMQl2Y7sgpqELCZTMAVISIR2IggV6vyC7ID14HILCIlM4AmbcQpGKI8zbC6wKFTBmKEOrlFPKi4k3A54ZFa3YPYovZB9J1NZ8iIzyNIU+ONKdi58TwufH2TH2Wx2BR+gHl88Q15wfER1NFR6kho60ccSxgt7+9nm1bmtdvafGrNAhvu3sRUQPYl6DF4gDNiLPyRv2jy5hnBgh/yWMm0if0JYKClj3qbSSFFShnXimQpT8qT43jslTz6ESBGbyLG/BJRRUoZRJOpdQFibWBKJwu7lTiTq/VwMw3Mk+0e2b1Anxqr9KLbb0XdBXOrXrkHduwjDvCiQPt5h+LG4p3fQv6W0D6gP9/8dTaEUrB906pKtqdeow5dNOZQbqQob9oEk0KVvUd6IwuGRBL6iO8u2j4JPJIF79MOOG0vQDZ75Ni3b2XQskLkAurEpdKzp8vPHIK5J1L023LBLFG5l6GQdoZLALtbohNfJPbTnpfiFYyxkv+jPN6E8x2DWVOatLBC6W6OP+bGaC5GpZbwfV/zELA3leHZPsDtU/kNbdEMSmr+ODSVwW/5B1wEfCUJ55lUDCDyYOuNj4EdQA+xeoHwMiD0IxSEFeu5ELLS9xG4FJlj3fBP1OaMrsUFg1ydjK5Me21lIAu5hySPoNVOBPpTpMqTCa/STKeObpVIK7iLX0N+ZylnKePiQpJ+j6hEwJZGplPHwj2sKYZFKGTaRnxAW4uxadWeA18pQjgueGt8ZyCq8QhhEtisu1ns8OJ6ouo1zFo0Qsc6uhXBGBOODPReRPVcVbHq3jl+A2asqS1aFIpzuc/ymcJsxr3Bbt/P0/97u1jWBdwHo55bkCsYMTv2+aw5O/eZyDk79DnoRrA53bmEKoB6nMd4mJQ6DcEy2l/X3CzLHaFJ+iER+AAAAAElFTkSuQmCC" alt="" width="57" height="57"></div>
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Welcome to Installs Direct!</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Dear [Customer_Name],&nbsp;<br>Thank you for choosing us as your partner on the path to a sustainable and energy-efficient future. We are thrilled to have you on board, and we can't wait to assist you in transforming your home with clean, renewable energy.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 5px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Here's a quick overview of what you can expect:</div>
                <br>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Personalized Solar Recommendations:</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Input your electricity consumption, choose your home by postcode, and let us guide you to the perfect solar system tailored to your needs.</div>
                &nbsp;
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Customize Your Solution:</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Select your roof type, add a battery for energy storage, choose the right size, and explore additional options like EV chargers to create a personalized energy solution.</div>
                <br>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Transparent Pricing:</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Our goal is to make the process smooth and transparent. Your personalized quote will be generated based on your selections, giving you a clear understanding of the investment required.</div>
                <br>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Expert Guidance:</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Our team of experts is here to support you at every step. Feel free to reach out with any questions or concerns &ndash; we're here to help!</div>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="background-color: #f5f7f9; padding: 15px; margin-top: 10px;">
                <table style="width: 100%;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #000; font-size: 22px; font-weight: 600;">Stay Connected</div>
                <div style="color: #000;">Join our community on social media to stay updated on the latest in sustainable living and to connect with others who share your passion for clean energy.</div>
                </td>
                </tr>
                <tr>
                <td align="center"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAABXklEQVR4Ae2VvUsCYRzHvyeSYN4SBhKUJxTREFFTNEhbODRFEM4OtjY3+wfUUEPkEGggtdoYRtKgEDkcvYB300lHDXUJCWLP85By8ijoeQcifuDu+T33PPd87/fGCfhnfe9Ego08XO4rdBToLRw9LTcACfai3KXiIWGTfHndJZThAHW4JRccxg2L+Lwe7EaWsTA3Bd+khz3L5l7I9Ty4QGBaxHlih4mY0fRvTsBSiI4Ot7nDu9G3B/NBPwJ+sTV/VT+QuXlidkU3BhcQvRNt8+OLezzKWtf9jlfRcJQprRqa2E4kDrZgVGvMzmRLJB+l/gWYiCmxZmg1NStK07+4dVtD1PTETE8eGD81JK8KzKbhioQXW2u0sSqkwShv6qdFgeovktdFZq8uzXACo12mY4EhELglf3+hAQV2Q87Mp2Iq64NcOh7aiJ4Fe3mvIL+3zVfWZlGUdW5fPh1T6fgH1EJnWNvCofQAAAAASUVORK5CYII=" alt="" width="24" height="24">&nbsp; <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAF9klEQVR4AY1VW2hcVRRd+9zXTGaSNInNNCom4AulmrSiqCAYteKbCtIvrf74RLH6oeKHRRFBpT5ARNAPRVBQ0YKioOITjQptYmP7YaGJbU1sJtJmJvO6r+PaZ1rwww8HDufOPfeutfZa+5wrOP67fNvUmOmYB4NYNgcJxsIUCFJBmAFhanltOHIE/B9k1t0Pch3W/fctZ2vnoxzfJFn85L0zk/OKKw78zh8mjPG/DhNZEyYETAjsCOBmB6YkSpZ1ZwX2OUIC+xmJLaxvc1GiEHae881bZiZnZPMdU2OxeF8TrKs66YL2F3yMjRYxvDaCZwGPYF4ON3z+N0rAubnQtq3DTWkvthDmJBElyXVeyWy6wY/a3vae3I6pQlVaGYqw9aHTceb6XvzPn3NhadcxTD+xT+KFhvWNI+n3TP6g3HPT1Jyf5mPqp6q9+/n1GKhEODR9FAe+ryKpJTBaAUEMy/eIp7Ox4u6H5QCVCwds5fK10lpoYdddPyP5qw5WwJHOyeNXfWsDDSjPcOsLGzE6sQZfPbMHv3/6J+/xIajXOuP4LNZQjKFyTxh8KeC1wbrJCs7ZPo6VXcvYd9+3MGJdef5Q3KaXGQbWFRz4oe8WsPjJfgxCwTKuqRLXJdajZCUynlYj1i+HMvH2leASftv6Oeq7R9B/wTCivsAm9VigwZ+U0jOkMlIpOMba9CEMyTEEyK0nmQusONIrI1vGZc2GU5DWO86C6ptTsKsNGpZCRBB5bbvy3UHp3TiMwpn9kuyuajriD6ImgSSorFvrCKLGMQyZo+yClBZkGLx2XEbu3wSvHCFvtAFbgtl4MoauOxtHnvvM/nHn25LngZUmlxot9UUKIz2oU70jOEnBTCxlb9URlL06TLQEBQ9H+jHy2A3IjvyNo0+9hs6eOa0L0aXj6L/7Rqy9b1JaM3OIF+tiDLMwabet+C6jokXMazCsylBYRdmvucVSUMNAYQl9hWUM3X6Fu9d6/R3YvbPW95iXR4umdmNlx7sw5QIGb9nIats28GIGG7vnjaTwlEwrULBAYlsI6q6fA4IYv0l2tmRlgGU3YH/5kcCeMGabua0UIJvdZ2mJFMZHxeM7jMoBOwLm4kmHBQj8glfnnNHvxPnnG/a9aRIeYkpFdElbyHPtfjYpwW2e2tQLKYhPUYBPgbrdhLk5ApOx4xLRXWN80xFVLRK7RY9l+qYlgWFq+6YhpRKC885C4HdUKe+34HkdKV5yLtd6kB+p0g6uMccTFSiR2uUGwW0gLQbtKoDwJDPFnIOivnzforkK74GH4V10gbPPM22E552B4l23OrD2ux8qARUrYHY8g0x3sdUcfH2BVfP47O48FFlIr3Ethk5V8MGrwNZHYB59Co5MvegpuWzaL78CU10kUMR8hNWfyIAiaZHJDImKfKPAl5pLXYKBPh6lhvC8x+Aw+wXw9K/AptuAwXXcKGXY2WlkH38MHDlG0IhJGDXemt7Q2ZwtLavVengztZLpqq7NdwnOvxT4bad121OL4imLmLvyox0Wbcps5ZAm42spbsSHDGzGBjBGIlrnCA4cVn2aiTUoG91dPJUY6uE9wOg4cNHVgj7e6+PaibmXVemzKqiHb0ck4QlgEOsGk+jKixFeMoHOr/vZWdysusYhdvumORTNGHr44nDF4vpnCTQMHPyJFsxatFYFml3MIzSh6nYuYFeCpwY6FnmBll54Gcz69eyoZRx99CV0FhtI8x4kWWHep6qdJNjmCPJlwQ+P84VtwGkX65D/+rj8+2eOz/nevbax4w2g2qA1RXdc8Lj5RuyL14yh35tm2WtQoh0aOPcSisM8Iof5oRhW9VStPckquEHRzIR5QPPAwQWb/n5IktWcqos2yXskyYqIqT5L/EmnyL63eQKF/CNWM8pq2LLSlZZ1bUCTQA1+7eucaySrcWGF1yuca7Sp5SFRSzjSrGjjvLiSpNHkqV+8NOMqlC07ZxCYSYK/hZLMM1B0B3d7SVyorrKQvRHqJ47X7hMHPQ3YcewsDp5B81T1cm5bGxRcsf8BlznCijTfG24AAAAASUVORK5CYII=" alt="" width="24" height="24"> &nbsp;<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA8klEQVR4Ad2VYRGDMAyFn4RJqASkzMEmoQ6Gg84Bc4AUJCABCRvdwV2aQHjAn92+u/xL01fyEoB/IY3xXolInA9j9OLMQydcVIKMYSrg0Yn81lMxKNXzy/pJxBJPUdzL+xKVavmytJBfq+IBBFp1gH1Z5o7yM1YgWVKtX1aJS3PcsJMAvx+uY1i8fsyRcBLdjxZlU08jVUuvs/NBEVA2NF/YgPQ9wxWl8iu254MmoFTPzMeu4tI1CdvzQZMVyqY24tIj+8rwEsU7dXDvvjLU2F5g7L4yRHA+Z/aVoYK1o0eAdZh2WpF8ZIFFrP9qT++p3+ADRDymKTc2AHkAAAAASUVORK5CYII=" alt="" width="24" height="24"></td>
                </tr>
                </tbody>
                </table>
                </div>
                <br>
                <table style="width: 100%; margin-top: 10px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Need Assistance?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">If you have any immediate questions or require assistance, don't hesitate to reply to this email or contact our customer support team at [hello@installsdirect.com].</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">Thank you for trusting Installs Direct for your energy needs. We look forward to bringing clean, renewable energy to your home!</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 5px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>
                <div>
                <div>[Company_Phone_Number]</div>
                </div>
                </div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr --></tbody>
                </table>
                </div>
                </center>
                EOT
            ],

            [
                'template_used_for' => 2,
                'subject' => 'Thank You for Choosing Installs Direct - Your Order Confirmation',
                'mail_body' => <<<'EOT'
                <center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Your Order Confirmation</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Dear <span style="font-weight: 600; color: #000;">[Customer_Name]</span>, <br>Thank you for choosing Installs Direct for your sustainable energy solution! We're excited to confirm that we've received your order.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="padding: 0px 30px; margin-top: 10px;">
                <table style="width: 100%; padding: 5px; border: 1px solid rgb(204, 204, 204); height: 111.953px;">
                <tbody>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Order No.</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Order_Number]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Date</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Order_Date]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Items ordered</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Items]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Total Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">
                <div>
                <div>&pound; [Total_Amount]</div>
                </div>
                </td>
                </tr>
                <tr>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600;">Booking Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0);">- &pound; [Booking_Amount]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Due Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">&pound; [Pending_Amount]</td>
                </tr>
                </tbody>
                </table>
                </div>
                <div style="padding: 30px;">
                <table style="width: 50%; padding: 5px; border: 1px solid#ccc; float: left; height: 183px;">
                <tbody>
                <tr>
                <td style="border: 1px solid #ccc; padding: 10px; color: #000;">
                <div style="font-weight: 600;">Payment Method</div>
                <div style="border-bottom: 1px solid #ccc; padding: 5px 0;">[Card_Details]</div>
                <div style="font-weight: 600; padding: 5px 0;">Billing Address</div>
                [Billing_Address]</td>
                </tr>
                </tbody>
                </table>
                <table style="width: 50%; padding: 5px; border: 1px solid#ccc; float: left; height: 183px;">
                <tbody>
                <tr>
                <td style="border: 1px solid #ccc; padding: 10px; color: #000;">
                <div style="font-weight: 600;">Estimated Installation Date</div>
                <div style="border-bottom: 1px solid #ccc; padding: 5px 0;">[Installation_Timeframe]</div>
                <div style="font-weight: 600; padding: 5px 0;">Installation Address</div>
                [Installtion_Address]</td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">What's Next?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Order Processing: Our team is now processing your order. You will receive a confirmation email once your order is ready for installation.</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">Installation Schedule: Our installation team will reach out to you shortly to discuss and schedule the installation date that suits you best.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="background-color: #f5f7f9; padding: 15px; margin-top: 10px;">
                <table style="width: 100%;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #000; font-size: 22px; font-weight: 600;">Stay Connected</div>
                <div style="color: #000;">Follow us on social media for updates, tips, and more!</div>
                </td>
                </tr>
                <tr>
                <td align="center">&nbsp;</td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 10px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 10px;">Questions or Concerns?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">If you have any questions or concerns about your order, feel free to reply to this email or contact our customer support team at [support@installsdirect.com]</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">Thank you for trusting Installs Direct for your energy needs. We look forward to bringing clean, renewable energy to your home!</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 5px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr --></tbody>
                </table>
                </div>
                </center>
                EOT
            ],

            [
                'template_used_for' => 3,
                'subject' => 'New Password',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img src="blob:http://installdirect.test/36fc2d1a-1929-463d-8bc1-28dd560bb5e0" alt="" width="330" height="40"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <tr>
                <td class="hero hero-2 bg_white" style="padding: 2em 0;" valign="middle">
                <table>
                <tbody>
                <tr>
                <td style="padding: 10px 30px;">
                <div class="text" style="font-weight: 600; text-align: left; font-size: 18px; color: #000;">Dear #[Customer_Name],</div>
                <div class="text" style="text-align: left;">
                <p style="color: #000; font-size: 16px;">Your account password has been updated. Please check the details below.</p>
                <p style="color: #000; font-size: 16px;"><br><strong> Account Information:</strong> <br><strong>Email:</strong> [Customer_Email]&nbsp;<br><strong>Password:</strong> [Customer_Password]&nbsp;<br>Remember to keep this safe. <br><br>Feel free to reach out to us at [hello@installsdirect.com] if you have any questions or need assistance. We're here to help!</p>
                </div>
                <div style="text-align: center;"><a style="text-decoration: none;" href="{{ route('login') }}" aria-invalid="true"> <button style="background-color: #000000; color: #ffffff; padding: 10px 10px; border: none; border-radius: 4px; width: 40%; font-size: 16px; cursor: pointer;"> Click here </button> </a></div>
                <div class="text" style="text-align: left; margin-top: 40px;">
                <div style="color: #000; font-size: 16px;">
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </div>
                <div style="color: #000; font-size: 16px;">&nbsp;</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr --></tbody>
                </table>
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_black footer email-section" valign="middle">
                <table>
                <tbody>
                <tr>
                <td valign="top" width="33.333%">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td style="text-align: center;">
                <p style="margin: 0; font-size: 14px; color: #b9b9b9;">Copyright &copy; 2022 Installs Direct. All rights reserved.</p>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                </center>
                EOT
            ],

            [
                'template_used_for' => 4,
                'subject' => 'New Order Confirmation – [Order_Number]',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;"><img src="blob:http://installdirect.test/3651656e-d80f-4d8c-bbba-e4dfb7be8de3" alt="" width="57" height="57"></div>
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Your Order Confirmation</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Dear Admin Team, <br>We hope this email finds you well. We're pleased to inform you that a new order has been placed on our website. Below are the details:</p>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="padding: 0px 30px; margin-top: 10px;">
                <table style="width: 100%; padding: 5px; border: 1px solid rgb(204, 204, 204); height: 111.953px;">
                <tbody>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Order No.</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Order_Number]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Date</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Order_Date]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Items ordered</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Items]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Total Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">&pound; [Total_Amount]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Booking Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">- &pound; [Booking_Amount]</td>
                </tr>
                <tr>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600;">Due Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0);">&pound; [Pending_Amount]</td>
                </tr>
                </tbody>
                </table>
                </div>
                <div style="padding: 30px;">
                <table style="width: 50%; padding: 5px; border: 1px solid#ccc; float: left; height: 183px;">
                <tbody>
                <tr>
                <td style="border: 1px solid #ccc; padding: 10px; color: #000;">
                <div style="font-weight: 600;">Customer Details</div>
                <div style="border-bottom: 1px solid #ccc; padding: 5px 0;">
                <p><span style="font-size: 10pt;">Customer Name: [Customer_Name]</span></p>
                <p><span style="font-size: 10pt;">Email Address: [Customer_Email]</span></p>
                <p><span style="font-size: 10pt;">Phone Number:[Customer_Phone_Number]</span></p>
                </div>
                <div style="font-weight: 600; padding: 5px 0;">Billing Address</div>
                [Billing_Address]</td>
                </tr>
                </tbody>
                </table>
                <table style="width: 50%; padding: 5px; border: 1px solid#ccc; float: left; height: 183px;">
                <tbody>
                <tr>
                <td style="border: 1px solid #ccc; padding: 10px; color: #000;">
                <div style="font-weight: 600;">Estimated Installation Date</div>
                <div style="border-bottom: 1px solid #ccc; padding: 5px 0;">[Installation_Timeframe]</div>
                <div style="font-weight: 600; padding: 5px 0;">Installation Address</div>
                [Installtion_Address]</td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">What's Next?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Order Processing: Our team is now processing your order. You will receive a confirmation email once your order is ready for installation.</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">&nbsp;</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">Installation Schedule: Our installation team will reach out to you shortly to discuss and schedule the installation date that suits you best.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                <!-- end tr --></div>
                </center>
                EOT
            ],
            [
                'template_used_for' => 5,
                'subject' => 'Reservation Confirmed - Thank You for Your Deposit!',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;"><img src="blob:http://installdirect.test/d5b9c285-ab85-42a7-ab13-3b378e17f288" alt="" width="57" height="57"></div>
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Your Order Confirmation</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding-top: 0px; padding-right: 30px; padding-bottom: 0px; margin: 0px;">Dear [Customer_Name],&nbsp;</p>
                <p>Congratulations! Your reservation for your solar installation with Installs Direct is now confirmed. We appreciate your commitment to a greener future and are excited to be part of your journey toward sustainable living.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="padding: 0px 30px; margin-top: 10px;">
                <table style="width: 100%; padding: 5px; border: 1px solid rgb(204, 204, 204); height: 111.953px;">
                <tbody>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Order No.</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Order_Number]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Reservation_Date</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">[Reservation_Date]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Total Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">&pound; [Total_Amount]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Booking Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">- &pound; [Booking_Amount]</td>
                </tr>
                <tr style="height: 22.3906px;">
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); font-weight: 600; height: 22.3906px;">Due Amount</td>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); height: 22.3906px;">&pound; [Pending_Amount]</td>
                </tr>
                </tbody>
                </table>
                </div>
                <div style="padding: 30px;">
                <table style="width: 99.0026%; padding: 5px; border: 1px solid rgb(204, 204, 204); float: left; height: 183px;">
                <tbody>
                <tr>
                <td style="border: 1px solid rgb(204, 204, 204); padding: 10px; color: rgb(0, 0, 0); width: 100%;">
                <div style="font-weight: 600;">Payment Details</div>
                <div>
                <p>[Card_Details]</p>
                <p>The &pound;[Booking_Amount] deposit you submitted will be applied towards the total cost of your solar installation.</p>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                &nbsp;
                <table style="width: 97.7327%; margin-top: 50px; margin-bottom: 20px; padding: 5px; height: 222px;">
                <tbody>
                <tr>
                <td style="width: 100%;">
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">What's Next?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <p>Installation Planning: Our team will now initiate the planning process for your installation. You can expect to hear from our installation team soon to discuss the specifics and finalize the schedule.</p>
                <p>&nbsp;</p>
                <p>Receipt and Confirmation Email:</p>
                <p>Once again, thank you for choosing Installs Direct. For your records, please keep an eye out for our confirmation email, which will include your payment receipt and all relevant details.</p>
                <p>&nbsp;</p>
                <p>Questions or Changes:</p>
                <p>If you have any questions about your reservation or need to make any changes, please reply to this email or contact our customer support team at [support@installsdirect.com].</p>
                <p>&nbsp;</p>
                <p>We're grateful for the trust you've placed in Installs Direct, and we look forward to delivering a seamless and outstanding solar installation experience for your home.</p>
                <p>&nbsp;</p>
                <p>Thank you for choosing a cleaner, more sustainable energy future!</p>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                <!-- end tr --></div>
                </center>
                EOT
            ],
            [
                'template_used_for' => 6,
                'subject' => 'Complete Your Solar Design Today and Start Saving!',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Your Order is waiting</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Dear [Customer_Name], <br>We noticed that you started the solar design process on our website but haven't completed it yet. Your journey to saving with solar is just a step away, and we're here to help!</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Completing your solar design is easy, and it only takes a few minutes. By finishing the process, you'll receive a personalized recommendation for a solar system that suits your home and energy needs. Plus, you'll have the opportunity to explore additional options like batteries and EV chargers.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 10px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0;">Here's how to complete your solar design:</div>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0;">&nbsp;</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Visit our website at [YourWebsiteURL].</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">&nbsp;</div>
                <div style="padding: 0px 30px; margin: 0; margin-top: 5px; color: #000;">Log in to your account using your credentials. Navigate to the solar design section, and you'll find your existing design in progress. If you encounter any difficulties or have questions during the process, feel free to reply to this email, and our team will be happy to assist you.</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">At Installs Direct, we believe in making the installation of a solar system simple and straightforward, and we're excited to help you save &pound;&pound;&pound;&pound; and contribute towards a greener future.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 5px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr --></tbody>
                </table>
                </div>
                </center>
                EOT
            ],
            [
                'template_used_for' => 7,
                'subject' => 'Unlocking Solar Potential: Schedule a Zoom Call with Our Experts!',
                'mail_body' => <<<'EOT'
                <!-- utf-8 works for most cases --><!-- Forcing initial-scale shouldn't be necessary --><!-- Use the latest (edge) version of IE rendering engine --><!-- Disable auto-scale in iOS 10 Mail entirely --><!-- The title tag shows in email notifications, like Android 4.4. -->
                <p>&nbsp;</p>
                <!-- CSS Reset : BEGIN --><!-- CSS Reset : END -->
                <p>&nbsp;</p>
                <!-- Progressive Enhancements : BEGIN --><center style="width: 100%; background-color: #f1f1f1;">
                <div style="display: none; font-size: 1px; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;</div>
                <div class="email-container" style="max-width: 600px; margin: 0 auto;"><!-- BEGIN BODY -->
                <table style="margin: auto;" role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                <td class="bg_white" style="padding: 1.5em 2.5em;" valign="top">
                <table role="presentation" border="0" width="100%" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>
                <td class="logo" style="text-align: center;"><a href="#"><img style="width: 250px; margin-top: 10px;" src="https://installdirect.appexperts.us/images/logo.jpg"></a></td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr -->
                <tr>
                <td class="hero hero-2 bg_white" valign="middle">
                <table style="width: 100%; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="background-color: #1a3466; padding: 15px;">
                <table style="width: 100%; margin-top: 0px;">
                <tbody>
                <tr>
                <td align="center">
                <div style="color: #fff; font-size: 22px; font-weight: 600;">Your Order is waiting</div>
                <div style="color: #fff;">Thank You for Choosing Installs Direct</div>
                </td>
                </tr>
                </tbody>
                </table>
                </div>
                <table style="width: 100%; margin-top: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">Dear [Schedule_Link], <br>We hope this message finds you well. Recently, you visited Installs Direct to explore sustainable energy solutions for your home, and we wanted to reach out and offer our assistance.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 10px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <p style="padding: 0px 30px; margin: 0;">We noticed that you left without completing your purchase, and we understand that choosing the right solar solution can be a significant decision. To ensure you have all the information you need, we invite you to schedule a personalized Zoom call with one of our solar experts.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 20px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0;">Why schedule a Zoom call?</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;"><strong>Expert Guidance:</strong> Our team of experts is ready to answer any questions you may have and provide personalized recommendations based on your specific needs.</div>
                <div style="padding: 0px 30px; margin: 0; margin-top: 5px; color: #000;"><strong>Tailored Solutions:</strong> can walk you through the solar design process, ensuring that the system we recommend aligns perfectly with your home and energy requirements.</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;"><strong>Clarify Doubts:</strong> If you have any concerns or uncertainties, the Zoom call is an excellent opportunity to address them directly with our knowledgeable team.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 20px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0;">How to schedule a Zoom call:</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">Click on the following link to access our online scheduling system: <br>[Schedule a Zoom Call].</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">&nbsp;</div>
                <div style="padding: 0px 30px; margin: 0; margin-top: 5px; color: #000;">Provide any specific topics or questions you'd like to discuss during the call.</div>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">If you're unable to find a suitable time or have any difficulties scheduling, please reply to this email, and we'll be happy to assist you further.</p>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">We understand the importance of making an informed decision when it comes to investing in solar energy, and our team is here to support you every step of the way.</p>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">&nbsp;</p>
                <p style="padding: 0px 30px; margin: 0; margin-top: 5px;">Thank you for considering Installs Direct. We look forward to the opportunity to assist you in harnessing the power of clean, renewable energy for your home.</p>
                </td>
                </tr>
                </tbody>
                </table>
                <table style="width: 100%; margin-top: 5px; margin-bottom: 20px; padding: 5px;">
                <tbody>
                <tr>
                <td>
                <div style="font-weight: 600; color: #000; padding: 0px 30px; margin: 0; margin-top: 20px;">Best Regards,</div>
                <div style="padding: 0px 30px; margin: 0; color: #000;">
                <div>The Installs Direct Team</div>
                <div>www.InstallsDirect.co.uk</div>
                <div>[Company_Phone_Number]</div>
                </div>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                </tbody>
                </table>
                </td>
                </tr>
                <!-- end tr --></tbody>
                </table>
                </div>
                </center>
                EOT
            ],
        ];
        foreach ($templates as $templateData) {
            $template = new EmailTemplate();
            $template->template_used_for = $templateData['template_used_for'];
            $template->subject = $templateData['subject'];
            $template->mail_body = $templateData['mail_body'];
            $template->slug = Str::slug($templateData['template_used_for']); // Generate slug using sluggable behavior
            $template->save();
        }
    }
}
