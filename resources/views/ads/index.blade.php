
@foreach ($ads as $ad)
				<div class="ad-banner" style="position: relative; display: inline-block;">
					<!-- Hiển thị tiêu đề "HOT HOT HOT" -->
					<h3 style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); font-size: 24px; color: red; font-weight: bold; z-index: 10;">HOT HOT HOT</h3>
			
					<!-- Hiển thị ảnh quảng cáo và tiêu đề lên ảnh -->
					<a href="{{ $ad->link }}" style="display: block; position: relative;">
						<img src="{{ $ad->img }}" alt="{{ $ad->title }}" style="width: 100%; height: auto;">
						
						<!-- Hiển thị tiêu đề quảng cáo lên ảnh -->
						<h3 style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 24px; color: white; font-weight: bold; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); z-index: 5;">{{ $ad->title }}</h3>
					</a>
				</div>
			@endforeach
