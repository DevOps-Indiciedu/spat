<style>
    .header > a {
        display: none !important;
    }
</style>
@component('mail::message')
<div class="text-center" style="text-align:center">
    <img src="{{ asset(MyApp::SITE_LOGO) }}" style="width:40%" alt="App Logo">
</div>
<br>
<br>
<b>Dear {{ $data['name'] }},</b>
<br><br>
Your account has been created on SECUREISM PVT LTD | Standard Procedure Automation Tool. 
To complete your registration and make sure only you have access to your info, 
click this link to setup your password or copy and paste the link in your browser. 
@component('mail::button', ['url' => $data['btn_url']])
Create Password
@endcomponent

Thanks <br>
SECUREISM PVT LTD | Standard Procedure Automation Tool
@endcomponent