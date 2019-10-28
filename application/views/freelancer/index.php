<div class="jumbotron halaman2">
    <h1 class="display-4">Temukan<span style="color:#ffc857;"> Freelancer </span><br>Terbaikmu</h1>
</div>
<section class="card-freelancer2">
    <div class="container js-confree">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-8 float-right">
                <div class="row filter_data">
                    <?php foreach ($freelancer as $free) : ?>
                    <div class="card mb-3">
                        <div class="js-bayangan">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="assets/img/img1.png" class="card-img" alt="...">
                                </div>
                                <div class="col-md-8">
                                    <div class="js-card">
                                        <div class="card-body">
                                            <h5 class="card-title"><?=$free['nama'] ?></h5>
                                            <h1 class="card-title"><?=$free['prof_skill'] ?></h1>
                                            <div class="potong">
                                                <p class="card-text">
                                                    sdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsdsd
                                                </p>
                                            </div>
                                            <p class="card-text"><small class="text-muted">Depok</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4 float-left">
                <aside id="wt-sidebar" class="wt-sidebar wt-usersidebar">
                    <form method="POST" action="" accept-charset="UTF-8" class="wt-formtheme wt-formsearch">
                        <input type="hidden" value="freelancer" name="type">
                        <div class="wt-widget wt-effectiveholder wt-startsearch" style="background-color: #9A72F6;">
                            <div class="wt-widgettitle">
                                <h2 style="color: white">Cari Freelancer</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                <div class="wt-formtheme wt-formsearch">
                                    <fieldset>
                                        <div class="input-group">
                                            <!-- keywordnya disini yo -->
                                            <input type="text" class="form-control" placeholder="Cari.."
                                                name="keyword">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="submit">Cari</button>
                                            </div>
                                            <!-- <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Cari . . ." value="">
                                        </div> -->
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                        <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgettitle">
                                <h2>skill</h2>
                            </div>

                            <div class="wt-widgetcontent">
                                <div class="wt-formtheme wt-formsearch">
                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                        <span class="wt-checkbox">
                                            <input id="java" type="checkbox" name="skill[]" value="1">
                                            <label for="java">Java</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="PHP" type="checkbox" name="skill[]" value="2">
                                            <label for="PHP">PHP</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="javascript" type="checkbox" name="skill[]" value="3">
                                            <label for="javascript">javascript</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="HTML" type="checkbox" name="skill[]" value="4">
                                            <label for="HTML">HTML</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="CSS" type="checkbox" name="skill[]" value="5">
                                            <label for="CSS">CSS</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="SQL" type="checkbox" name="skill[]" value="6">
                                            <label for="SQL">SQL</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="bootstrap" type="checkbox" name="skill[]" value="7">
                                            <label for="bootstrap">bootstrap</label>
                                        </span>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgettitle">
                                <h2>Kota</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                <div class="wt-formtheme wt-formsearch">
                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                        <span class="wt-checkbox">
                                            <input id="jakarta" type="checkbox" name="kota[]" value="1">
                                            <label for="jakarta">jakarta</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="Bogor" type="checkbox" name="kota[]" value="2">
                                            <label for="Bogor">Bogor</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="Depok" type="checkbox" name="kota[]" value="3">
                                            <label for="Depok">Depok</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="Tangerang" type="checkbox" name="kota[]" value="4">
                                            <label for="Tangerang">Tangerang</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="Bekasi" type="checkbox" name="kota[]" value="5">
                                            <label for="Bekasi">Bekasi</label>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="wt-widget wt-effectiveholder">
                                        <div class="wt-widgettitle">
                                            <h2>Hourly Rate</h2>
                                        </div>
                                        <div class="wt-widgetcontent">
                                            <div class="wt-formtheme wt-formsearch">
                                                <fieldset>
                                                    <div class="form-group">
                                                        <input type="text" class="form-control filter-records"
                                                            placeholder="Search Rate">
                                                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i
                                                                class="lnr lnr-magnifier"></i></a>
                                                    </div>
                                                </fieldset>
                                                <fieldset>
                                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                                        <span class="wt-checkbox">
                                                            <input id="rate-0-5" type="checkbox" name="hourly_rate[]"
                                                                value="0-5">
                                                            <label for="rate-0-5">$5 And Below</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="rate-5-10" type="checkbox" name="hourly_rate[]"
                                                                value="5-10">
                                                            <label for="rate-5-10">$5 - $10</label>
                                                        </span>
                                                        <span class="wt-checkbox">
                                                            <input id="rate-10-20" type="checkbox" name="hourly_rate[]"
                                                                value="10-20">
                                                            <label for="rate-10-20">$10 - $20</label>
                                                        </span>
      
                                                    </div>
                                                </fieldset>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgettitle">
                                <h2>Tipe Freelancer</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                <div class="wt-formtheme wt-formsearch">
                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                        <span class="wt-checkbox">
                                            <input id="perorangan" type="checkbox" name="tipe_freelancer[]" value="perorangan">
                                            <label for="perorangan">perorangan</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="Agensi" type="checkbox" name="tipe_freelancer[]" value="agensi">
                                            <label for="Agensi">Agensi</label>
                                        </span>


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgettitle">
                                <h2>English Level</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                <div class="wt-formtheme wt-formsearch">
                                    <fieldset>
                                        <div class="wt-checkboxholder wt-verticalscrollbar">
                                            <span class="wt-checkbox">
                                                <input id="rate-basic" type="checkbox" name="english_level[]"
                                                    value="basic">
                                                <label for="rate-basic">Basic</label>
                                            </span>
                                            <span class="wt-checkbox">
                                                <input id="rate-conversational" type="checkbox" name="english_level[]"
                                                    value="conversational">
                                                <label for="rate-conversational">Conversational</label>
                                            </span>
                                            <span class="wt-checkbox">
                                                <input id="rate-fluent" type="checkbox" name="english_level[]"
                                                    value="fluent">
                                                <label for="rate-fluent">Fluent</label>
                                            </span>
                                            <span class="wt-checkbox">
                                                <input id="rate-native" type="checkbox" name="english_level[]"
                                                    value="native">
                                                <label for="rate-native">Native Or Bilingual</label>
                                            </span>
                                            <span class="wt-checkbox">
                                                <input id="rate-professional" type="checkbox" name="english_level[]"
                                                    value="professional">
                                                <label for="rate-professional">Professional</label>
                                            </span>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgettitle">
                                <h2>Languages</h2>
                            </div>
                            <div class="wt-widgetcontent">
                                <fieldset>
                                    <div class="form-group">
                                        <input type="text" class="form-control filter-records"
                                            placeholder="Search Languages">
                                        <a href="javascrip:void(0);" class="wt-searchgbtn"><i
                                                class="lnr lnr-magnifier"></i></a>
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="wt-checkboxholder wt-verticalscrollbar">
                                        <span class="wt-checkbox">
                                            <input id="language-ab" type="checkbox" name="languages[]" value="ab">
                                            <label for="language-ab">Abkhazian</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="language-aa" type="checkbox" name="languages[]" value="aa">
                                            <label for="language-aa">Afar</label>
                                        </span>
                                        <span class="wt-checkbox">
                                            <input id="language-arabic" type="checkbox" name="languages[]"
                                                value="arabic">
                                            <label for="language-arabic">Arabic</label>
                                        </span>

                                    </div>
                                </fieldset>
                            </div>
                        </div> -->
                        <div class="wt-widget wt-effectiveholder">
                            <div class="wt-widgetcontent">
                                <div class="wt-applyfilters">
                                    <span>Klik "Simpan" untuk mendapatkan<br> perubahan pada
                                        pencarian</span>
                                    <input class="btn btn-primary tombol" type="submit" value="Simpan" name="keyword">
                                </div>
                            </div>
                        </div>
                    </form>
                </aside>
            </div>
        </div>
    </div>
</section>