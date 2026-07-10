@extends('layouts.app')

@section('content')

<style> 
 
*{ 
    margin:0; 
    padding:0; 
    box-sizing:border-box; 
    font-family:Arial,Helvetica,sans-serif; 
} 
 
body{ 
    background:#eef5ee; 
} 
 
.container{ 
    width:90%; 
    margin:auto; 
    margin-top:10px; 
} 
 
.title{ 
    text-align:center; 
    margin-bottom:30px; 
} 
 
.title h1{ 
    color:#1b5e20; 
    font-size:38px; 
    margin-bottom:5px; 
} 
 
.title p{ 
    color:#666; 
    font-size:18px; 
} 
 
.cards{ 
    display:grid; 
    grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); 
    gap:30px; 
} 
 
.card{ 
    background:white; 
    border-radius:20px; 
    padding:30px; 
    text-align:center; 
    box-shadow:0 10px 20px rgba(0,0,0,.15); 
    transition:.3s; 
} 
 
.card:hover{ 
    transform:translateY(-8px); 
} 
 
.card h2{ 
    color:#2e7d32; 
    margin-bottom:20px; 
} 
 
.count{ 
    font-size:50px; 
    font-weight:bold; 
    color:#ff9800; 
    margin-bottom:20px; 
} 
 
.btn{ 
    display:inline-block; 
    padding:12px 30px; 
    background:#2e7d32; 
    color:white; 
    text-decoration:none; 
    border-radius:30px; 
    transition:.3s; 
} 
 
.btn:hover{ 
    background:#145a18; 
} 
 
.no-question{ 
    color:red; 
    font-weight:bold; 
    margin-bottom:20px; 
} 
 
@media(max-width:700px){ 
    .container{ 
        width:94%; 
        margin-top:6px; 
    } 
 
    .title{ 
        margin-bottom:24px; 
    } 
 
    .title h1{ 
        font-size:32px; 
    } 
 
    .title p{ 
        font-size:16px; 
    } 
 
    .cards{ 
        gap:20px; 
    } 
} 
 
</style> 

<div class="container"> 

<div class="title"> 

<h1>{{ t('Expert Dashboard') }}</h1> 

<p>{{ t('Select a category to answer community questions.') }}</p> 

</div> 

<div class="cards"> 

<div class="card"> 

    <h2>🌾 {{ t('Crop Questions') }}</h2> 

    @if($cropCount > 0) 

        <div class="count"> 

            {{ $cropCount }} 

        </div> 

    @else 

        <div class="no-question"> 

            {{ t('No Questions Asked') }} 

        </div> 

    @endif 

    <a href="{{ route('expert.crop.users') }}" class="btn"> 

        {{ t('Open') }} 

    </a> 

</div> 

<div class="card"> 

    <h2>🍎 {{ t('Fruit Questions') }}</h2> 

    @if($fruitCount > 0) 

        <div class="count"> 

            {{ $fruitCount }} 

        </div> 

    @else 

        <div class="no-question"> 

            {{ t('No Questions Asked') }} 

        </div> 

    @endif 

    <a href="{{ route('expert.fruit.users') }}" class="btn"> 

        {{ t('Open') }} 

    </a> 

</div> 

<div class="card"> 

    <h2>🥕 {{ t('Vegetable Questions') }}</h2> 

    @if($vegetableCount > 0) 

        <div class="count"> 

            {{ $vegetableCount }} 

        </div> 

    @else 

        <div class="no-question"> 

            {{ t('No Questions Asked') }} 

        </div> 

    @endif 

    <a href="{{ route('expert.vegetable.users') }}" class="btn"> 

        {{ t('Open') }} 

    </a> 

</div> 

</div> 

</div> 

@endsection
