@extends('layout.app')

@section('title')
FAQs
@endsection

@section('content')
<div class="userFaq">
    <p class="faq-heading">FAQs</p>
    <hr>
    @foreach ($faqs as $faq)
    <div class="faq-content">
        <button class="collapse">
            <p>{{ $faq->faq_question }} </p> <a href="{{ route('faq.delete', ['id'=>$faq->id]) }}" class="bx bx-trash"></a>
        </button>
        <div class="collapse-content">
            <p> {{ $faq->faq_answer }} </p>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection