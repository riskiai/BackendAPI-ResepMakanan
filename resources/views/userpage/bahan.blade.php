@extends('userpage.layouts.main')
@section('bahan-active', 'active')

@section('content')

<main>
    <section id="section-bahan">
        <div class="container">
            <form action="#" class="pb-5 pt-5 mt-5">
                <div class="input pt-2">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text"  placeholder="cari resep" name="search">
                </div>
            </form>
            <div class="row">
                <div class="col-lg-6 col-12 order-1 order-lg-0 pt-5">
                    <img class="w-100" src="{{asset('assets/image/bahan.jpg')}}" alt="">
                </div>
                <div class="col-lg-4 offset-lg-2 col-12  text-center">
                    <p class="bahan-desc"> Mau masak apa hari ini ?
                        Masak Bahan Yang Kamu miliki Tinggal pilih bahan yang kamu punya dan dapatkan  resep dengan bahan yang kamu punya!
                    </p>
                </div>
            </div>
            <div class="row">
                <h5>Cari bahan berdasarkan abjad</h5>
                <div class="abjad">
                    <a href="#a">A</a>
                    <a href="#b">B</a>
                    <a href="#c">C</a>
                    <a href="#d">D</a>
                    <a href="#e">E</a>
                    <a href="#f">F</a>
                    <a href="#g">G</a>
                    <a href="#h">H</a>
                    <a href="#i">I</a>
                    <a href="#j">J</a>
                    <a href="#k">K</a>
                    <a href="#l">L</a>
                    <a href="#m">M</a>
                    <a href="#n">N</a>
                    <a href="#o">O</a>
                    <a href="#p">P</a>
                    <a href="#q">Q</a>
                    <a href="#r">R</a>
                    <a href="#s">S</a>
                    <a href="#t">T</a>
                    <a href="#u">U</a>
                    <a href="#v">V</a>
                    <a href="#w">W</a>
                    <a href="#x">X</a>
                    <a href="#y">Y</a>
                    <a href="#z">Z</a>
                </div>
            </div>
            <div class="row pt-5">
                <div class="abjad-bahan" id="a">
                    <h5>A</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Ayam</a>
                        </li>
                        <li>
                            <a href="">Asam Jawa</a>
                        </li>
                        <li>
                            <a href="">Ampela</a>
                        </li>
                        <li>
                            <a href="">Acar</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="b">
                    <h5>B</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Bayam</a>
                        </li>
                        <li>
                            <a href="">Brokoli</a>
                        </li>
                        <li>
                            <a href="">Bawang Putih</a>
                        </li>
                        <li>
                            <a href="">Bihun</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="c">
                    <h5>C</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Ceker Ayam</a>
                        </li>
                        <li>
                            <a href="">Cumi</a>
                        </li>
                        <li>
                            <a href="">Cengkeh</a>
                        </li>
                        <li>
                            <a href="">Cabai</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="d">
                    <h5>D</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Daging Sapi</a>
                        </li>
                        <li>
                            <a href="">Daun Bawang</a>
                        </li>
                        <li>
                            <a href="">Daun Salam</a>
                        </li>
                        <li>
                            <a href="">Daun Jeruk</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="e">
                    <h5>E</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Ebi</a>
                        </li>
                        <li>
                            <a href="">Entog</a>
                        </li>
                        <li>
                            <a href="">Edamame</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="f">
                    <h5>F</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Fillet Ayam</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="g">
                    <h5>G</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Gula Pasir</a>
                        </li>
                        <li>
                            <a href="">Gula Batu</a>
                        </li>
                        <li>
                            <a href="">Garam</a>
                        </li>
                        <li>
                            <a href="">Gandum</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="h">
                    <h5>H</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Hazelnut</a>
                        </li>
                        <li>
                            <a href="">Ham</a>
                        </li>
                        <li>
                            <a href="">Hati Ayam</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="i">
                    <h5>I</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Ikan</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="j">
                    <h5>J</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Jahe</a>
                        </li>
                        <li>
                            <a href="">Jeruk Nipis</a>
                        </li>
                        <li>
                            <a href="">Jengkol</a>
                        </li>
                        <li>
                            <a href="">Jamur</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="k">
                    <h5>K</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Kunyit</a>
                        </li>
                        <li>
                            <a href="">Ketumbar</a>
                        </li>
                        <li>
                            <a href="">Kangkung</a>
                        </li>
                        <li>
                            <a href="">Kecap</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="l">
                    <h5>L</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Lengkuas</a>
                        </li>
                        <li>
                            <a href="">Lada</a>
                        </li>
                        <li>
                            <a href="">Lobak</a>
                        </li>
                        <li>
                            <a href="">Lemon</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="m">
                    <h5>M</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Merica</a>
                        </li>
                        <li>
                            <a href="">Madu</a>
                        </li>
                        <li>
                            <a href="">Mentega</a>
                        </li>
                        <li>
                            <a href="">Minyak</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="n">
                    <h5>N</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Nasi</a>
                        </li>
                        <li>
                            <a href="">Nanas</a>
                        </li>
                        <li>
                            <a href="">Nangka Muda</a>
                        </li>
                        <li>
                            <a href="">Nangka</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="o">
                    <h5>O</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Otak-otak</a>
                        </li>
                        <li>
                            <a href="">Oregano</a>
                        </li>
                        <li>
                            <a href="">Opak</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="p">
                    <h5>P</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Pala</a>
                        </li>
                        <li>
                            <a href="">Paprika</a>
                        </li>
                        <li>
                            <a href="">Pandan</a>
                        </li>
                        <li>
                            <a href="">Pete</a>
                        </li>
                        <li>
                            <a href="">Penyedap Rasa</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="q">
                    <h5>Q</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">-</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="r">
                    <h5>R</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Ragi</a>
                        </li>
                        <li>
                            <a href="">Rambutan</a>
                        </li>
                        <li>
                            <a href="">Rumput Laut</a>
                        </li>
                        <li>
                            <a href="">Roti</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="s">
                    <h5>S</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Sereh</a>
                        </li>
                        <li>
                            <a href="">Sambal</a>
                        </li>
                        <li>
                            <a href="">Saus</a>
                        </li>
                        <li>
                            <a href="">Susu</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="t">
                    <h5>T</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Tepung</a>
                        </li>
                        <li>
                            <a href="">Telur</a>
                        </li>
                        <li>
                            <a href="">Tomat</a>
                        </li>
                        <li>
                            <a href="">Terasi</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="u">
                    <h5>U</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Udang</a>
                        </li>
                        <li>
                            <a href="">Ubi</a>
                        </li>
                        <li>
                            <a href="">Usus Ayam</a>
                        </li>
                        <li>
                            <a href="">Urap</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="v">
                    <h5>V</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Vanilla</a>
                        </li>
                        <li>
                            <a href="">Vanili</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="w">
                    <h5>W</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Wijen</a>
                        </li>
                        <li>
                            <a href="">Wortel</a>
                        </li>
                        <li>
                            <a href="">Wagyu</a>
                        </li>
                        <li>
                            <a href="">Wijen</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="x">
                    <h5>X</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">-</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="y">
                    <h5>Y</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Yoghurt</a>
                        </li>
                    </ul>
                </div>
                <div class="abjad-bahan" id="z">
                    <h5>Z</h5>
                    <ul class="list-bahan">
                        <li>
                            <a href="">Zaitun</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </section>
</main>

@endsection
