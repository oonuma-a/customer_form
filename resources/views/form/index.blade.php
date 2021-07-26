@extends('layouts.layout')
@section('title', '登録フォーム | sample')
@section('inner-headline')
	<section id="inner-headline">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="pageTitle">登録フォーム</h2>
				</div>
			</div>
		</div>
	</section>
@endsection
@section('form-content')
	<section id="content">
		<div class="container">
			<div class="row form-container">
				<div class="row bs-wizard">
					<div class="col-xs-4 bs-wizard-step active">
						<div class="text-center bs-wizard-stepnum">登録</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">パスワード入力</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
					<div class="col-xs-4 bs-wizard-step disabled">
						<div class="text-center bs-wizard-stepnum">登録完了</div>
						<div class="progress"><div class="progress-bar"></div></div>
						<a href="#" class="bs-wizard-dot"></a>
					</div>
				</div>
				<!-- Form itself -->
				<form name="sentMessage" id="applicationForm" class="form-horizontal" action="/form/conf" method="post">
				@csrf
					<section class="panel">
					@if(count($errors) > 0)
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					@endif
						<header class="panel-heading form-heading">お客様情報のご登録</header>
						<div class="panel-body form-body">
							<h3 class="form-intitle">お客様情報</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（漢字）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="苗字" name="name_sei">
									<input type="text" class="form-control input -col-2" placeholder="名前" name="name_mei">
                            	</div>
							</div>
                            <div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">名前（フリガナ）<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-2" placeholder="ミョウジ" name="name_sei_kana">
									<input type="text" class="form-control input -col-2" placeholder="ナマエ" name="name_mei_kana">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">生年月日<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<select name="birthday_y" class="select form-control m-b-10">
										<option value="">----</option>
										@for($i=1997;$i>=1942;$i--)
										<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select><span>年</span>
									<select name="birthday_m" class="select form-control m-b-10">
										<option value="">--</option>
										@for($i=0; $i<=12; $i++)
											<option value="{{$i}}">{{$i}}</option>
										@endfor
									</select><span>月</span>
									<select name="birthday_d" class="select form-control m-b-10">
										<option value="">--</option>
										@for($i=0; $i<=31; $i++)
											<option value="{{$i}}">{{$i}}</option>
											<!-- <option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option> -->
										@endfor
									</select><span>日</span>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">TEL<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">
									<input type="text" class="form-control input -col-tel" name="tel1"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel2"><span>－</span>
									<input type="text" class="form-control input -col-tel" name="tel3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">メールアドレス<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" class="form-control" id="mail" name="email">
								</div>
							</div>
							<h3 class="form-intitle">現住所(ご登録住所)</h3>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">郵便番号<span class="form-icon-required">必須</span></label>
								<div class="form-inline col-md-9 col-sm-8">						
									<input type="text" name="zip1" value="" class="form-control input -col-post js_numOnry size_post" maxlength="3" id="user_zip1"><span>－</span>
									<input type="text" name="zip2" value="" class="form-control input -col-post js_numOnry size_post" maxlength="4" id="user_zip2">
									<button type="button" class="btn btn-primary" id="zip_btn"> 住所変換 </button>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">都道府県<span class="form-icon-required">必須</span></label>
								<div class="col-sm-5">
									<select name="adr1" class="select form-control m-b-10" id="pref">
										<option value="">選択してください</option>
                                        @foreach($prefectures as $prefecture)
                                            <option value="{{$prefecture}}">{{$prefecture}}</option>
                                        @endforeach
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">市区町村<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr2" value="" maxlength="30" class="form-control input" id="city" placeholder="例）新宿区">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">住所（番地）<span class="form-icon-required">必須</span></label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr3" value="" class="form-control input" id="address1" maxlength="40" placeholder="例）○○○1-2-3">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-3 col-sm-4 control-label">建物</label>
								<div class="col-md-9 col-sm-8">
									<input type="text" name="adr4" value="" class="form-control input" maxlength="40" placeholder="例）メゾンドハイツ105">
								</div>
							</div>
						</div>
					</section>
					<div class="row text-center">
						<div class="col-md-12">
							<p id="overlapResult" data-result=""></p>
						</div>
					</div>
					<div class="text-center submit-area">
						<button type="submit" class="btn btn-primary btn-lg">入力内容を確認する</button>
					</div>
				</form>
			</div>
		</div>		
	</section>
@endsection