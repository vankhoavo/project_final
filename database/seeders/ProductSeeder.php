<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        DB::table('products')->delete();
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'product_name' => 'Bàn phím cơ không dây E-DRA EK314W Blue switch (104 phím, Wireless 2.4GHz, Bluetooth, E-dra Switch, Màu Đen)',
                'slug_product' => 'ban-phim-co-khong-day-e-dra-ek314w-blue-switch-104-phim-wireless-24ghz-bluetooth-e-dra-switch-mau-den',
                'picture' => 'https://philong.com.vn/media/product/30086-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => 'Kết nối: Wireless 2.4G, BluetoothKeycaps: ABS, Layout: 104 phímSwitch: E-dra Switch (Blue / Red / Brown), Đèn nền: Không',
                'detailed_description' => 'Kết nối: Wireless 2.4G, BluetoothKeycaps: ABS, Layout: 104 phímSwitch: E-dra Switch (Blue / Red / Brown), Đèn nền: Không',
                'quantity' => 10,
                'status' => 1,
                'price_sell' => 599000,
                'price_discount' => 499000,
                'id_product_type' => 1,
                'id_brand' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'product_name' => 'Bàn phím cơ Gaming không dây Logitech G Pro X TKL LIGHTSPEED Black, GX Tactile Switch (920-012137))',
                'slug_product' => 'ban-phim-co-gaming-khong-day-logitech-g-pro-x-tkl-lightspeed-black-gx-tactile-switch-920-012137',
                'picture' => 'https://philong.com.vn/media/product/31126-ban-phim-co-khong-day-logitech-g-pro-x-tkl-lightspeed-black-920-012137-philong--2-.jpg',
                'short_description' => 'Kết nối Bluetooth Wireless với công nghệ LIGHTSPEED cho tốc độ phản hồi chỉ 1msSử dụng Switch GX Tactile độc quyền của LogitechCông nghệ LIGHTSYNC RGB 16.8 triệu màu mang lại cảm giác đồng điệu về hình ảnh và âm thanh với trò chơiThời lượng pin lên đến 50 giờ cho một lần sạc đầy12 phím F có thể lập trìnhKhoảng cách hành trình: 1.9 mm - 2.0 mm2 tùy chọn màu sắc: Đen/Trắng',
                'detailed_description' => 'Kết nối Bluetooth Wireless với công nghệ LIGHTSPEED cho tốc độ phản hồi chỉ 1msSử dụng Switch GX Tactile độc quyền của LogitechCông nghệ LIGHTSYNC RGB 16.8 triệu màu mang lại cảm giác đồng điệu về hình ảnh và âm thanh với trò chơiThời lượng pin lên đến 50 giờ cho một lần sạc đầy12 phím F có thể lập trìnhKhoảng cách hành trình: 1.9 mm - 2.0 mm2 tùy chọn màu sắc: Đen/Trắng',
                'quantity' => 5,
                'status' => 1,
                'price_sell' => 5790000,
                'price_discount' => 4790000,
                'id_product_type' => 1,
                'id_brand' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây FL-Esports CMK75SAM Desert Grey, FLCMMK Ice Violet Switch (3 mode, Hotswap, Gasket mount, Núm xoay, Màn hiển thị, Led RGB)',
                'slug_product' => 'ban-phim-co-khong-day-fl-esports-cmk75sam-desert-grey-flcmmk-ice-violet-switch-3-mode-hotswap-gasket-mount-num-xoay-man-hien-thi-led-rgb',
                'picture' => 'https://philong.com.vn/media/product/30492-ban-phim-co-fl-esports-cmk75sam-desert-grey-philong--1-.jpg',
                'short_description' => 'Layout 75%, 82 nút phím (81 phím + 1 núm xoay)3 chế độ kết nối: USB, 2.4GHz, BluetoothKeycap: PBT doubleshot, FSA profileMạch xuôi, Gasket Mount, Plate PC, Trang bị sẵn đệm tiêu âmSwitch: FLCMMK Ice Violet, Hỗ trợ Hot SwapPin: 3000mAh, Led: RGB',
                'detailed_description' => 'Layout 75%, 82 nút phím (81 phím + 1 núm xoay)3 chế độ kết nối: USB, 2.4GHz, BluetoothKeycap: PBT doubleshot, FSA profileMạch xuôi, Gasket Mount, Plate PC, Trang bị sẵn đệm tiêu âmSwitch: FLCMMK Ice Violet, Hỗ trợ Hot SwapPin: 3000mAh, Led: RGB',
                'quantity' => 3,
                'status' => 1,
                'price_sell' => 349000,
                'price_discount' => 249000,
                'id_product_type' => 1,
                'id_brand' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây CIDOO V75 Pro Tri-mode Matt Grey Switch (USB-C, Bluetooth, 2.4Ghz, Vỏ nhôm CNC)',
                'slug_product' => 'ban-phim-co-khong-day-cidoo-v75-pro-tri-mode-matt-grey-switch-usb-c-bluetooth-24ghz-vo-nhom-cnc',
                'picture' => 'https://philong.com.vn/media/product/30725-ban-phim-co-khong-day-cidoo-v75-pro-tri-mode-matt-grey-switch-philong--1-.jpg',
                'short_description' => 'Layout 75%, Có núm xoay chỉnh âm lượng3 chế độ kết nối: Cáp USB-C, Bluetooth, 2.4GhzKeycap: PBT Dyesub, Cherry profileMạch xuôi, gasket mount, hỗ trợ hotswap thay switch dễ dàngSwitch: Cidoo Matt GreyPin: 3000mAh; Led: RGB',
                'detailed_description' => 'Layout 75%, Có núm xoay chỉnh âm lượng3 chế độ kết nối: Cáp USB-C, Bluetooth, 2.4GhzKeycap: PBT Dyesub, Cherry profileMạch xuôi, gasket mount, hỗ trợ hotswap thay switch dễ dàngSwitch: Cidoo Matt GreyPin: 3000mAh; Led: RGB',
                'quantity' => 8,
                'status' => 1,
                'price_sell' => 4190000,
                'price_discount' => 3190000,
                'id_product_type' => 1,
                'id_brand' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ Asus TUF Gaming K3 (Full size, Red Switch, USB 2.0, Có kê tay)',
                'slug_product' => 'ban-phim-co-asus-tuf-gaming-k3-full-size-red-switch-usb-20-co-ke-tay',
                'picture' => 'https://philong.com.vn/media/product/29786-phi-long-ban-phim-co-gaming-asus-tuf-k3-red-switch-01.jpg',
                'short_description' => 'Bàn phím cơ RGB cơ với tuổi thọ 50 triệu lần nhấn phím cho hiệu suất lâu dàiChống kẹt phím 100% với công nghệ N-key rollover (NKRO) giúp người dùng có thể ấn đồng thời nhiều phím cùng lúc, phản hồi cực tốtKết hợp các phím dễ dàng để điều chỉnh nhanh các chức năng đa phương tiệnVới cổng USB 2.0 mở rộng giúp kết nối nhanh các thiết bị sử dụng hàng ngày như chuột, ổ đĩa USB, sạc điện thoại thông minh hoặc máy tính bảngVỏ bề mặt bằng hợp kim nhôm bền bỉ với thời gianTám phím có thể lập trình đầy đủ để gán macro một cách nhanh chóng và lưu trữ các tinh chỉnh trên bộ nhớ tích hợpPhím đèn nền độc lập trang bị công nghệ Aura Sync RGB LED để tạo ra số lượng tùy chọn cá nhân hóa không giới hạn',
                'detailed_description' => 'Bàn phím cơ RGB cơ với tuổi thọ 50 triệu lần nhấn phím cho hiệu suất lâu dàiChống kẹt phím 100% với công nghệ N-key rollover (NKRO) giúp người dùng có thể ấn đồng thời nhiều phím cùng lúc, phản hồi cực tốtKết hợp các phím dễ dàng để điều chỉnh nhanh các chức năng đa phương tiệnVới cổng USB 2.0 mở rộng giúp kết nối nhanh các thiết bị sử dụng hàng ngày như chuột, ổ đĩa USB, sạc điện thoại thông minh hoặc máy tính bảngVỏ bề mặt bằng hợp kim nhôm bền bỉ với thời gianTám phím có thể lập trình đầy đủ để gán macro một cách nhanh chóng và lưu trữ các tinh chỉnh trên bộ nhớ tích hợpPhím đèn nền độc lập trang bị công nghệ Aura Sync RGB LED để tạo ra số lượng tùy chọn cá nhân hóa không giới hạn',
                'quantity' => 3,
                'status' => 1,
                'price_sell' => 2850000,
                'price_discount' => 1850000,
                'id_product_type' => 1,
                'id_brand' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím không dây Bluetooth Logitech Pebble Keys 2 K380s, Tonal White (920-011754)',
                'slug_product' => 'ban-phim-khong-day-bluetooth-logitech-pebble-keys-2-k380s-tonal-white-920-011754',
                'picture' => 'https://philong.com.vn/media/product/31044-ban-phim-khong-day-bluetooth-logitech-pebble-keys-2-k380s-tonal-white-920-011754-philong--3-.jpg',
                'short_description' => 'Kết nối: Bluetooth Low Engergy, tương thích với USB Logi Bolt (không đi kèm, phải mua rời)Hỗ trợ kết nối lên đến 3 thiết bị, chuyển đổi dễ dàng Easy-Switch.Có đèn LED báo mức pin. Công tắc bật/tắt bên cạnh phímCác phím chức năng có thể tùy chỉnh thông qua ứng dụng Logi Option+Sử dụng 2 pin AAA Alkaline, thời lượng pin lên đến 36 tháng',
                'detailed_description' => 'Kết nối: Bluetooth Low Engergy, tương thích với USB Logi Bolt (không đi kèm, phải mua rời)Hỗ trợ kết nối lên đến 3 thiết bị, chuyển đổi dễ dàng Easy-Switch.Có đèn LED báo mức pin. Công tắc bật/tắt bên cạnh phímCác phím chức năng có thể tùy chỉnh thông qua ứng dụng Logi Option+Sử dụng 2 pin AAA Alkaline, thời lượng pin lên đến 36 tháng',
                'quantity' => 4,
                'status' => 1,
                'price_sell' => 1050000,
                'price_discount' => 990000,
                'id_product_type' => 1,
                'id_brand' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây CIDOO V65 Dual Mode Matt Grey Switch (USB-C, Bluetooth, Vỏ nhôm CNC)',
                'slug_product' => 'ban-phim-co-khong-day-cidoo-v65-dual-mode-matt-grey-switch-usb-c-bluetooth-vo-nhom-cnc',
                'picture' => 'https://philong.com.vn/media/product/30724-ban-phim-co-khong-day-cidoo-v65-dual-mode-matt-grey-switch-philong--1-.jpg',
                'short_description' => 'Layout 60%, Có núm xoay chỉnh âm lượng2 chế độ kết nối: Cáp USB-C, BluetoothKeycap: PBT Dyesub, Cherry profileMạch xuôi, gasket mount, hỗ trợ hotswap thay switch dễ dàngSwitch: Cidoo Matt GreyPin: 3000mAh; Led: RGB',
                'detailed_description' => 'Layout 60%, Có núm xoay chỉnh âm lượng2 chế độ kết nối: Cáp USB-C, BluetoothKeycap: PBT Dyesub, Cherry profileMạch xuôi, gasket mount, hỗ trợ hotswap thay switch dễ dàngSwitch: Cidoo Matt GreyPin: 3000mAh; Led: RGB',
                'quantity' => 15,
                'status' => 1,
                'price_sell' => 3790000,
                'price_discount' => 2790000,
                'id_product_type' => 1,
                'id_brand' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím không dây Logitech MX Keys S Graphite (920-011563) (Bluetooth, USB 2.4Ghz Logi Bolt, Kết nối 3 thiết bị, Pin 5 tháng)',
                'slug_product' => 'ban-phim-khong-day-logitech-mx-keys-s-graphite-920-011563-bluetooth-usb-24ghz-logi-bolt-ket-noi-3-thiet-bi-pin-5-thang',
                'picture' => 'https://philong.com.vn/media/product/30705-ban-phim-khong-day-logitech-mx-keys-s-graphite-920-011563-philong--4-.jpg',
                'short_description' => 'Loại sản phẩm: Bàn phím không dây cao cấpKết nối: USB 2.4Ghz Logi Bolt, Bluetooth Low EngeryThời lượng pin: Lên đến 5 tháng (tắt đèn bàn phím), 10 ngày (bật đèn bàn phím)Kết nối lên đến 3 thiết bịTương thích: Windows, macOS, iPadOS, ChromeOS, Linux',
                'detailed_description' => 'Loại sản phẩm: Bàn phím không dây cao cấpKết nối: USB 2.4Ghz Logi Bolt, Bluetooth Low EngeryThời lượng pin: Lên đến 5 tháng (tắt đèn bàn phím), 10 ngày (bật đèn bàn phím)Kết nối lên đến 3 thiết bịTương thích: Windows, macOS, iPadOS, ChromeOS, Linux',
                'quantity' => 12,
                'status' => 1,
                'price_sell' => 2990000,
                'price_discount' => 2890000,
                'id_product_type' => 1,
                'id_brand' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây FL-Esports CMK75SAM Lake Placid Blue, FLCMMK Ice Pink Switch (3 mode, Hotswap, Gasket mount, Núm xoay, Màn hiển thị, Led RGB)',
                'slug_product' => 'ban-phim-co-khong-day-fl-esports-cmk75sam-lake-placid-blue-flcmmk-ice-pink-switch-3-mode-hotswap-gasket-mount-num-xoay-man-hien-thi-led-rgb',
                'picture' => 'https://philong.com.vn/media/product/30490-ban-phim-co-fl-esports-cmk75sam-lake-placid-blue-philong--2-.jpg',
                'short_description' => 'Layout 75%, 82 nút phím (81 phím + 1 núm xoay)3 chế độ kết nối: USB, 2.4GHz, BluetoothKeycap: PBT doubleshot, FSA profileMạch xuôi, Gasket Mount, Plate PC, Trang bị sẵn đệm tiêu âmSwitch: FLCMMK Ice Pink, Hỗ trợ Hot SwapPin: 3000mAh, Led: RGB',
                'detailed_description' => 'Layout 75%, 82 nút phím (81 phím + 1 núm xoay)3 chế độ kết nối: USB, 2.4GHz, BluetoothKeycap: PBT doubleshot, FSA profileMạch xuôi, Gasket Mount, Plate PC, Trang bị sẵn đệm tiêu âmSwitch: FLCMMK Ice Pink, Hỗ trợ Hot SwapPin: 3000mAh, Led: RGB',
                'quantity' => 20,
                'status' => 1,
                'price_sell' => 2590000,
                'price_discount' => 2490000,
                'id_product_type' => 1,
                'id_brand' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây Asus ROG Azoth (NX Red Switch, USB-C, Bluetooth 5.1, RF 2.4GHz)',
                'slug_product' => 'ban-phim-co-khong-day-asus-rog-azoth-nx-red-switch-usb-c-bluetooth-51-rf-24ghz',
                'picture' => 'https://philong.com.vn/media/product/29705-phi-long-rog-azoth-01.jpg',
                'short_description' => 'Thiết kế gasket mount silicone độc đáo với ba lớp bọt giảm chấn tạo ra trải nghiệm gõ phím tuyệt vờiKết nối 3 chế độ: USB 2.0, Bluetooth 5.1, RF 2.4GHz (công nghệ không dây ROG SpeedNova)Layout 75 phím. Màn hình OLED và điều khiển trực quanSwitch cơ học ROG NX (Red, Blue. Brown) có thể thay thế (Hot-swappable), keycap PBT double shot ROG cao cấpBao gồm các sản phẩm dầu bôi trơn Krytox™ GPL-205-GD0 hỗ trợ cho người mới bắt đầu DIY bàn phímThiết kế tiện dụng: Hai cặp chân bàn phím với độ cao khác nhau cung cấp đến ba vị trí nghiêng khác nhauHỗ trợ MacOS: Dễ dàng chuyển đổi giữa chế độ Windows và MacOS',
                'detailed_description' => 'Thiết kế gasket mount silicone độc đáo với ba lớp bọt giảm chấn tạo ra trải nghiệm gõ phím tuyệt vờiKết nối 3 chế độ: USB 2.0, Bluetooth 5.1, RF 2.4GHz (công nghệ không dây ROG SpeedNova)Layout 75 phím. Màn hình OLED và điều khiển trực quanSwitch cơ học ROG NX (Red, Blue. Brown) có thể thay thế (Hot-swappable), keycap PBT double shot ROG cao cấpBao gồm các sản phẩm dầu bôi trơn Krytox™ GPL-205-GD0 hỗ trợ cho người mới bắt đầu DIY bàn phímThiết kế tiện dụng: Hai cặp chân bàn phím với độ cao khác nhau cung cấp đến ba vị trí nghiêng khác nhauHỗ trợ MacOS: Dễ dàng chuyển đổi giữa chế độ Windows và MacOS',
                'quantity' => 2,
                'status' => 1,
                'price_sell' => 799000,
                'price_discount' => 699000,
                'id_product_type' => 1,
                'id_brand' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ E-DRA EK387L White Huano Blue switch, 87 phím, Blue LED',
                'slug_product' => 'ban-phim-co-e-dra-ek387l-white-huano-blue-switch-87-phim-blue-led',
                'picture' => 'https://philong.com.vn/media/product/29746-phi-long-ban-phim-co-e-dra-ek387l-white-huano-blue-switch.jpg',
                'short_description' => 'Số lượng phím: 87 phímTop cover: ABS, Bottom cover: ABSKeycap: Double injection key capsLaser Logo - full antishosting keysSwitch Huano: Blue Sw, Brown Sw, Red Sw',
                'detailed_description' => 'Số lượng phím: 87 phímTop cover: ABS, Bottom cover: ABSKeycap: Double injection key capsLaser Logo - full antishosting keysSwitch Huano: Blue Sw, Brown Sw, Red Sw',
                'quantity' => 4,
                'status' => 1,
                'price_sell' => 750000,
                'price_discount' => 650000,
                'id_product_type' => 1,
                'id_brand' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn Phím Cơ FL-Esports GP75CPM Polar Night Kailhbox V2 Red Switch (Type C, Bluetooth, Wireless 2.4Ghz)',
                'slug_product' => 'ban-phim-co-fl-esports-gp75cpm-polar-night-kailhbox-v2-red-switch-type-c-bluetooth-wireless-24ghz',
                'picture' =>     'https://philong.com.vn/media/product/30089-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => '3 chế độ kết nối: USB/2.4/BluetoothCherry doubleshot Keycap, tính năng Hot Swap thay switch dễ dàngLed RGB, SoftwareTrang bị sẵn đệm tiêu âm siliconHỗ trợ hệ điều hành: Windows, MacOS',
                'detailed_description' => '3 chế độ kết nối: USB/2.4/BluetoothCherry doubleshot Keycap, tính năng Hot Swap thay switch dễ dàngLed RGB, SoftwareTrang bị sẵn đệm tiêu âm siliconHỗ trợ hệ điều hành: Windows, MacOS',
                'quantity' => 6,
                'status' => 1,
                'price_sell' => 2290000,
                'price_discount' => 2190000,
                'id_product_type' => 1,
                'id_brand' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ Asus TUF Gaming K7 (Full size, Tactile Switch, USB 2.0, Có kê tay',
                'slug_product' => 'ban-phim-co-asus-tuf-gaming-k7-full-size-tactile-switch-usb-20-co-ke-tay',
                'picture' => 'https://philong.com.vn/media/product/30223-tuf-gaming-k7_2d_aura--1-.png',
                'short_description' => 'Switch cơ quang tiên tiến để kích hoạt chính xác nhanh hơn bàn phím cơ tiêu chuẩn 25 lần và hỗ trợ cả switch dạng tactile lẫn linearĐộ bền chống xâm nhập bụi và nước IP56, bản mặt nhôm cấp độ máy bay và có tuổi thọ gấp đôi so với phím cơ truyền thống để đảm bảo độ tin cậy dài hạnNam châm tích hợp để tháo hoặc lắp tựa kê cổ tay nhanh chóngPhím đèn nền độc lập trang bị công nghệ Aura Sync RGB LEDTạo bản đồ macro theo phím lập trình hoàn toàn, điều chỉnh các thiết lập bằng phần mềm Armoury II',
                'detailed_description' => 'Switch cơ quang tiên tiến để kích hoạt chính xác nhanh hơn bàn phím cơ tiêu chuẩn 25 lần và hỗ trợ cả switch dạng tactile lẫn linearĐộ bền chống xâm nhập bụi và nước IP56, bản mặt nhôm cấp độ máy bay và có tuổi thọ gấp đôi so với phím cơ truyền thống để đảm bảo độ tin cậy dài hạnNam châm tích hợp để tháo hoặc lắp tựa kê cổ tay nhanh chóngPhím đèn nền độc lập trang bị công nghệ Aura Sync RGB LEDTạo bản đồ macro theo phím lập trình hoàn toàn, điều chỉnh các thiết lập bằng phần mềm Armoury II',
                'quantity' => 8,
                'status' => 1,
                'price_sell' => 2990000,
                'price_discount' => 1990000,
                'id_product_type' => 1,
                'id_brand' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ không dây E-DRA EK314W Màu đen, Red switch (104 phím, Wireless 2.4GHz, Bluetooth, E-dra Switch)',
                'slug_product' => 'ban-phim-co-khong-day-e-dra-ek314w-mau-den-red-switch-104-phim-wireless-24ghz-bluetooth-e-dra-switch',
                'picture' => 'https://philong.com.vn/media/product/30089-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => 'Kết nối: Wireless 2.4G, BluetoothKeycaps: ABS',
                'detailed_description' => 'Layout: 104 phímSwitch: E-dra Switch (Blue / Red / Brown)Đèn nền: Không',
                'quantity' => 6,
                'status' => 1,
                'price_sell' => 599000,
                'price_discount' => 499000,
                'id_product_type' => 1,
                'id_brand' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ Gaming không dây Logitech G Pro X TKL LIGHTSPEED White, GX Tactile Switch (920-012149)',
                'slug_product' => 'ban-phim-co-gaming-khong-day-logitech-g-pro-x-tkl-lightspeed-white-gx-tactile-switch-920-012149',
                'picture' => 'https://philong.com.vn/media/product/31127-ban-phim-co-khong-day-logitech-g-pro-x-tkl-lightspeed-white-920-012149-philong--1-.jpg',
                'short_description' => 'Kết nối Bluetooth Wireless với công nghệ LIGHTSPEED cho tốc độ phản hồi chỉ 1msSử dụng Switch GX Tactile độc quyền của LogitechCông nghệ LIGHTSYNC RGB 16.8 triệu màu mang lại cảm giác đồng điệu về hình ảnh và âm thanh với trò chơiThời lượng pin lên đến 50 giờ cho một lần sạc đầy12 phím F có thể lập trìnhKhoảng cách hành trình: 1.9 mm - 2.0 mm2 tùy chọn màu sắc: Đen/Trắng',
                'detailed_description' => 'Kết nối Bluetooth Wireless với công nghệ LIGHTSPEED cho tốc độ phản hồi chỉ 1msSử dụng Switch GX Tactile độc quyền của LogitechCông nghệ LIGHTSYNC RGB 16.8 triệu màu mang lại cảm giác đồng điệu về hình ảnh và âm thanh với trò chơiThời lượng pin lên đến 50 giờ cho một lần sạc đầy12 phím F có thể lập trìnhKhoảng cách hành trình: 1.9 mm - 2.0 mm2 tùy chọn màu sắc: Đen/Trắng',
                'quantity' => 6,
                'status' => 1,
                'price_sell' => 5790000,
                'price_discount' => 4790000,
                'id_product_type' => 1,
                'id_brand' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ DareU EK75 Pro Triple Mode Black Golden - DareU Dream Switch (USB-C, Bluetooth, Wireless 2.4G, 80 phím, Núm xoay, Keycap PBT, Led viền 2 bên)',
                'slug_product' => 'ban-phim-co-dareu-ek75-pro-triple-mode-black-golden-dareu-dream-switch-usb-c-bluetooth-wireless-24g-80-phim-num-xoay-keycap-pbt-led-vien-2-ben',
                'picture' => 'https://philong.com.vn/media/product/30991-ban-phim-co-dareu-ek75-pro-triple-mode-black-golden-dareu-dream-switch-philong--1-.jpg',
                'short_description' => 'Layout: 75% (80 phím + 1 núm xoay)Kết nối: USB-C, Bluetooth, Wireless 2.4GHzSwitch: DareU Dream SwitchKeycap: PBT Doubleshot, OEM profileLed RGB, Có led gầm 2 bên; Pin 3750mAhTính năng khác: Gasket mount, Hotswap 5 pin',
                'detailed_description' => 'Layout: 75% (80 phím + 1 núm xoay)Kết nối: USB-C, Bluetooth, Wireless 2.4GHzSwitch: DareU Dream SwitchKeycap: PBT Doubleshot, OEM profileLed RGB, Có led gầm 2 bên; Pin 3750mAhTính năng khác: Gasket mount, Hotswap 5 pin',
                'quantity' => 30,
                'status' => 1,
                'price_sell' => 1290000,
                'price_discount' => 1190000,
                'id_product_type' => 1,
                'id_brand' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím không dây Bluetooth Logitech Pebble Keys 2 K380s, Tonal Rose (920-011755)',
                'slug_product' => 'ban-phim-khong-day-bluetooth-logitech-pebble-keys-2-k380s-tonal-rose-920-011755',
                'picture' => '	https://philong.com.vn/media/product/30089-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => 'Kết nối: Bluetooth Low Engergy, tương thích với USB Logi Bolt (không đi kèm, phải mua rời)Hỗ trợ kết nối lên đến 3 thiết bị, chuyển đổi dễ dàng Easy-Switch.Có đèn LED báo mức pin. Công tắc bật/tắt bên cạnh phímCác phím chức năng có thể tùy chỉnh thông qua ứng dụng Logi Option+Sử dụng 2 pin AAA Alkaline, thời lượng pin lên đến 36 tháng',
                'detailed_description' => 'Kết nối: Bluetooth Low Engergy, tương thích với USB Logi Bolt (không đi kèm, phải mua rời)Hỗ trợ kết nối lên đến 3 thiết bị, chuyển đổi dễ dàng Easy-Switch.Có đèn LED báo mức pin. Công tắc bật/tắt bên cạnh phímCác phím chức năng có thể tùy chỉnh thông qua ứng dụng Logi Option+Sử dụng 2 pin AAA Alkaline, thời lượng pin lên đến 36 tháng',
                'quantity' => 7,
                'status' => 1,
                'price_sell' => 1090000,
                'price_discount' => 990000,
                'id_product_type' => 1,
                'id_brand' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím cơ DareU EK1280S V2 Black - Blue D Switch (104 phím, Multi-led, Led gầm 2 bên, DareU D Switch)',
                'slug_product' => 'ban-phim-co-dareu-ek1280s-v2-black-blue-d-switch-104-phim-multi-led-led-gam-2-ben-dareu-d-switch',
                'picture' => 'https://philong.com.vn/media/product/30878-ban-phim-co-dareu-ek1280s-v2-black-d-switch-philong--1-.jpg',
                'short_description' => 'Phiên bản V2 - Thêm 2 dải LED bên sườnLED nền: RainbowSử dụng Switch D siêu bền của DareUChuẩn layout ANSI, Full size 104 phímKeycap ABS DoubleshotKết nối: Có dây, Cáp dài 1.8mN-Key Rollover: Có',
                'detailed_description' => 'Phiên bản V2 - Thêm 2 dải LED bên sườnLED nền: RainbowSử dụng Switch D siêu bền của DareUChuẩn layout ANSI, Full size 104 phímKeycap ABS DoubleshotKết nối: Có dây, Cáp dài 1.8mN-Key Rollover: Có',
                'quantity' => 8,
                'status' => 1,
                'price_sell' => 890000,
                'price_discount' => 790000,
                'id_product_type' => 1,
                'id_brand' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn phím quang cơ DareU EK810X Black-Grey Optical Blue Switch (104 phím, ABS Keycap, Multiled, Chống nước)',
                'slug_product' => 'ban-phim-quang-co-dareu-ek810x-black-grey-optical-blue-switch-104-phim-abs-keycap-multiled-chong-nuoc',
                'picture' => '	https://philong.com.vn/media/product/30089-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => 'Sử dụng switch Quang học cao cấpChống nước tuyệt đốiMulti-LED - 7 màu chia theo vùngKeycap ABS Doubleshot siêu bềnThiết kế cổ điển, siêu chắc chắn',
                'detailed_description' => 'Sử dụng switch Quang học cao cấpChống nước tuyệt đốiMulti-LED - 7 màu chia theo vùngKeycap ABS Doubleshot siêu bềnThiết kế cổ điển, siêu chắc chắn',
                'quantity' => 1,
                'status' => 1,
                'price_sell' => 890000,
                'price_discount' => 790000,
                'id_product_type' => 1,
                'id_brand' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ], [
                'product_name' => 'Bàn Phím Cơ FL-Esports GP75CPM Polar Night Kailhbox V2 Red Switch (Type C, Bluetooth, Wireless 2.4Ghz)',
                'slug_product' => 'ban-phim-co-fl-esports-gp75cpm-polar-night-kailhbox-v2-red-switch-type-c-bluetooth-wireless-24ghz',
                'picture' => '	https://philong.com.vn/media/product/30089-philong-ban-phim-co-khong-day-e-dra-ek314w-mau-den.jpg',
                'short_description' => '3 chế độ kết nối: USB/2.4/BluetoothCherry doubleshot Keycap, tính năng Hot Swap thay switch dễ dàngLed RGB, SoftwareTrang bị sẵn đệm tiêu âm siliconHỗ trợ hệ điều hành: Windows, MacOS',
                'detailed_description' => '3 chế độ kết nối: USB/2.4/BluetoothCherry doubleshot Keycap, tính năng Hot Swap thay switch dễ dàngLed RGB, SoftwareTrang bị sẵn đệm tiêu âm siliconHỗ trợ hệ điều hành: Windows, MacOS',
                'quantity' => 6,
                'status' => 1,
                'price_sell' => 2290000,
                'price_discount' => 2190000,
                'id_product_type' => 1,
                'id_brand' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
