@extends('layouts.welcome')
@section('title', 'Jeu concours')
@section('content')
@if($gagnant->isEmpty())
  <div class="hero">
    <div class="container">
      <div class="hreo-wrapper">
        <div class="hero-text text-center">
          <h1>Entrer mon <br>
          Numero gagnant</h1>
        </div>
        <div class="hreo-code text-center">
          <form method="post" action="{{route('user.gagner')}}">
            @csrf
            <input type="text" name="numero_ticket" placeholder="Entrer mon numéro gagnant">
            <button type="submit">Participer</button>
            @if (session('activated'))
              <span class="invalid-feedback-welcome" role="alert">
                  <strong>{{ session('activated') }}</strong>
              </span>
            @endif
            @error('numero_ticket')
              <span class="invalid-feedback-welcome" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- hero area end -->

  <!-- price area start -->
  <div class="price">
    <div class="container">
      <div class="price-wrapper">
        <div class="price-heading">
          <h2>Les prix à gagner sont</h2>
        </div>
        <div class="price-block">
          <div class="row">
            <div class="col-lg-4 col-md-4">
              <div class="pb-one text-center">
                <img src="{{ asset('img/welcome/pb1.png')}}" alt="images not found">
                <p>Un menu au choix</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="pb-one text-center">
                <img src="{{ asset('img/welcome/pb2.png')}}" alt="images not found">
                <p>Un burger au choix</p>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="pb-one text-center">
                <img src="{{ asset('img/welcome/pb3.png')}}" alt="images not found">
                <p>Un dessert ou entrée au choix</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- price area end -->

  <!-- discount area start -->
  <div class="discount">
    <div class="container-fluid">
      <div class="discount-wrapper">
        <div class="row align-items-center">
          <div class="col-lg-6 col-md-6">
            <div class="discount-left d-none d-md-block">
              <h2>70% de réduction sur n'importe quels produits  ou<br/>
                Le grand prix: La Range Rover evoque</h2>
            </div>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="discount-right">
              <img src="{{ asset('img/welcome/car.png')}}" alt="images not found">
              <div class="discount-content d-block d-md-none text-center">
                <p>70% de réduction sur n'importe quels produits  ou</p>
                <p>le grand prix: La Range Rover evoque</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- discount area end -->

  <!-- perticipate area start -->
  <div class="perticipate">
    <div class="container">
      <div class="perticipate-wrapper text-center text-white">
        <div class="perticipate-heading">
          <h2>Comment participer</h2>
        </div>
        <div class="perticipate-list">
          <div class="perlist-one">
            <h4> MANGER</h4>
            <p> Achète un menu à 18 euros et recois un numéro gagnant</p>
          </div>
          <div class="perlist-one">
            <h4> JOUER</h4>
            <p> Valide ton numéro gagnant et recois un prix.</p>
          </div>
          <div class="perlist-one">
            <h4> FETE</h4>
            <p> Tu as gagné un prix? Fais la fête</p>
          </div>
          <div class="perlist-one">
            <h4> REPETER</h4>
            <p> Essaie encore afin de pouvoir gagner le grand prix</p>
          </div>
          <div class="perlist-one">
            <h4> ENJOY</h4>
            <p class="mb-0"> Present your coupon to the cashier to collect your price.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- perticipate area end -->

  <!-- maxi area start -->
  <div class="maxi">
    <div class="contaienr">
      <div class="maxi-wrapper text-center">
        <div class="maxi-heading">
          <h2>Notre menu maxi</h2>
        </div>
        <div class="maxi-content">
          <img src="{{ asset('img/welcome/maxi.png')}}" alt="images not found">
        </div>
      </div>
    </div>
  </div>
@else
  <div class="hero">
    <div class="container">
      <div class="hreo-wrapper">
      </div>
      </div>
    </div>
  </div>
  <!-- hero area end -->

  <!-- price area start -->
  <div class="price">
    <div class="container">
      <div class="price-wrapper">
        <div class="price-heading">
          <h1 class="text-center">Le jeu concours est fini nous avons le gagnant de la range rover!</h1>
        </div>
        </div>
      </div>
    </div>
  </div>
@endif
@endsection
