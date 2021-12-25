@extends('layout.app')

@section('title')
FAQs
@endsection

@section('content')
<div class="contactUs">
    <p class="contact-heading">Contact Us</p>
    <hr>
    <p >Please fill out the form below and submit if you have any feedback or queries about our service.</p>
    <form action="{{ route('user.storeEnquiry') }}" method="post">
        @csrf
        <div class="enquiry-detail">
            <div class="inputName">
                <label for="name">YOUR NAME</label><br>
                <input type="text" id="name" name="name" placeholder="Your name" required>
            </div>
            <div class="inputEmail">
                <label for="email">EMAIL ADDRESS</label> <br>
                <input type="email" id="email" name="email" placeholder="you@gmail.com" required>
            </div>
        </div>
        <label for="enquiry">ENQUIRY</label> <br>
        <textarea name="enquiry" id="enquiry" required placeholder="Your details here"></textarea> <br>

        <input type="submit" class="btn contactBtn">
    </form>
</div>
@endsection