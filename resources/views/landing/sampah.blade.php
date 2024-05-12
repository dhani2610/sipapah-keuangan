@extends('layout-frontend.app')

@section('style')
<style>

.sec-icon {
  position: relative;
  display: inline-block;
  padding: 0;
  margin: 0 auto;
}

.sec-icon::before {
  content: "";
  position: absolute;
  height: 1px;
  left: -70px;
  margin-top: -5.5px;
  top: 60%;
  background: #333333;
  width: 50px;
}

.sec-icon::after {
  content: "";
  position: absolute;
  height: 1px;
  right: -70px;
  margin-top: -5.5px;
  top: 60%;
  background: #333;
  width: 50px;
}

.advertisers-service-sec {
  background-color: #f5f5f5;
}

.advertisers-service-sec span {
  color: linear-gradient(310deg,#17ad37,#17ad37);
}

.advertisers-service-sec .col {
  padding: 0 1em 1em 1em;
  text-align: center;
}

.advertisers-service-sec .service-card {
  width: 100%;
  height: 100%;
  padding: 2em 1.5em;
  border-radius: 5px;
  box-shadow: 0 0 35px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  transition: 0.5s;
  position: relative;
  z-index: 2;
  overflow: hidden;
  background: #fff;
}

.advertisers-service-sec .service-card::after {
  content: "";
  width: 100%;
  height: 100%;
  background: linear-gradient(310deg,#17ad37,#17ad37);
  position: absolute;
  left: 0%;
  top: -98%;
  z-index: -2;
  transition: all 0.4s cubic-bezier(0.77, -0.04, 0, 0.99);
}

.advertisers-service-sec h3 {
  font-size: 20px;
  text-transform: capitalize;
  font-weight: 600;
  color: #1f194c;
  margin: 1em 0;
  z-index: 3;
}
.advertisers-service-sec h1 {
  font-size: 30px;
  text-transform: capitalize;
  font-weight: 900;
  color: #1f194c;
  margin: 1em 0;
  z-index: 3;
}

.advertisers-service-sec p {
  color: #575a7b;
  font-size: 15px;
  line-height: 1.6;
  letter-spacing: 0.03em;
  z-index: 3;
}

.advertisers-service-sec .icon-wrapper {
  background-color: #2c7bfe;
  position: relative;
  margin: auto;
  font-size: 30px;
  height: 2.5em;
  width: 2.5em;
  color: #ffffff;
  border-radius: 50%;
  display: grid;
  place-items: center;
  transition: 0.5s;
  z-index: 3;
}

.advertisers-service-sec .service-card:hover:after {
  top: 0%;
}

.service-card .icon-wrapper {
  background-color: #ffffff;
  color: linear-gradient(310deg,#17ad37,#17ad37);
}

.advertisers-service-sec .service-card:hover .icon-wrapper {
  color: #0dcaf0;
}

.advertisers-service-sec .service-card:hover h3 {
  color: #ffffff;
}
.advertisers-service-sec .service-card:hover h1 {
  color: #ffffff;
}

.advertisers-service-sec .service-card:hover p {
  color: #f0f0f0;
}
/* ADVERTISERS SERVICE CARD ENDED */


</style>
@endsection

@section('content-fe')
  <!-- ADVERTISERS SERVICE CARD -->
<section id="advertisers" class="advertisers-service-sec pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="section-header text-center">
          <h2 class="fw-bold fs-1" style="color: black">
            TOTAL SAMPAH  <br> TERKELOLA 
            {{-- <span class="b-class-secondary">Advertiser </span>Services --}}
          </h2>
          <p class="sec-icon"><i class="fa-solid fa-gear"></i></p>
        </div>
      </div>
      <div class="row mt-5 mt-md-4 row-cols-1 row-cols-sm-1 row-cols-md-3 justify-content-center">
        <div class="col">
          <div class="service-card">
            <h1>{{ $DataSampahOrganik }} KG</h1>
            <h3>SAMPAH ORGANIK TERKELOLA</h3>
            {{-- <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Quisquam consequatur necessitatibus eaque.
            </p> --}}
          </div>
        </div>
        <div class="col">
          <div class="service-card">
          
            <h1>{{ $DataSampahAnorganik }} KG</h1>
            <h3>SAMPAH ANORGANIK TERKELOLA</h3>
            {{-- <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Quisquam consequatur necessitatibus eaque.
            </p> --}}
          </div>
        </div>
        <div class="col">
          <div class="service-card">
            <h1>{{ $DataSampahResidu }} KG</h1>
            <h3>SAMPAH RESIDU TERKELOLA</h3>
            {{-- <p>
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Quisquam consequatur necessitatibus eaque.
            </p> --}}
          </div>
        </div>
       
      </div>
    </div>
  </section>
  <!-- ADVERTISERS SERVICE CARD ENDED -->
@endsection

@section('script')

@endsection