<?php
include '../../App/connect.php';
//Đường dẫn thu viện phpSpreadsheet
require '../../vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$data=new Database();
$data->connect();

//Tạo file 
$spredsheet = new Spreadsheet();//Tạo file excel
$sheet = $spredsheet->getActiveSheet(); //Tạo sheet excel
//Chỉnh thuộc tính chung của cột
$cell = array('A','B','C','D','E','F','G','H','I','J','K');
//Chỉnh căn giữa
foreach($cell as $col)
{
    $sheet->getStyle($col)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle($col)->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
    $sheet->getColumnDimension($col)->setAutoSize(true);
}
//Chỉnh viền
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'], // Màu đen
        ],
    ],
];

//Lấy dữ liệu người dùng
if(isset($_REQUEST['us'])) 
{
    $fileName = 'Customer.xlsx';  //Đặt tên file
    //Nhập dữ liệu header
    $sheet->setCellValue('A1','ID')
          ->setCellValue('B1','Name')
          ->setCellValue('C1','Address')
          ->setCellValue('D1','Phone')
          ->setCellValue('E1','Login');
    
    $key =0;
    $result = $data->query('SELECT * from user');
    while ($row = $result->fetch_assoc())
    {
        //Nhập dữ liệu từng dòng 
        $sheet->setCellValue('A'.($key +2),$row['id_user'])
              ->setCellValue('B'.($key +2),$row['Name'])
              ->setCellValue('C'.($key +2),$row['Address'])
              ->setCellValue('D'.($key +2),$row['Phone_Num'])
              ->setCellValue('E'.($key +2),$row['Login_name']);
              $key++;
    }
    $sheet->getStyle('A1:E'.$key +1.)->applyFromArray($styleArray);//Set viền cho bảng
    //Set màu cho header
    $sheet->getStyle('A1:E1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A1:E1')->getFill()->getStartColor()->setARGB('C0C0C0');
}

//Lấy dữ liệu sản phẩm
if(isset($_REQUEST['prod'])) 
{
    $fileName = 'Product.xlsx';  //Đặt tên file
    //Nhập dữ liệu header
    $sheet->setCellValue('A1','ID')
          ->setCellValue('B1','Name')
          ->setCellValue('C1','Type')
          ->setCellValue('D1','Color')
          ->setCellValue('E1','Size')
          ->setCellValue('F1','Amount')
          ->setCellValue('G1','Cost')
          ->setCellValue('H1','Discount');
    
    $key =0;
    $result = $data->query('SELECT 
                            product.id_product,
                            product.Name,
                            product_list.Type_name,
                            product.Color,
                            product.Size,
                            product.Cost,
                            product.Amount,
                            product.Discount
                            from product 
                            inner join product_list on product.Type_id = product_list.Type_id');
    while ($row = $result->fetch_assoc())
    {
        //Nhập dữ liệu từng dòng 
        $sheet->setCellValue('A'.($key +2),$row['id_product'])
              ->setCellValue('B'.($key +2),$row['Name'])
              ->setCellValue('C'.($key +2),$row['Type_name'])
              ->setCellValue('D'.($key +2),$row['Color'])
              ->setCellValue('E'.($key +2),$row['Size'])
              ->setCellValue('F'.($key +2),$row['Amount'])
              ->setCellValue('G'.($key +2),$row['Cost'])
              ->setCellValue('H'.($key +2),$row['Discount']);
              $key++;
    }
    $sheet->getStyle('A1:H'.$key +1.)->applyFromArray($styleArray);//Set viền cho bảng
    //Set màu cho header
    $sheet->getStyle('A1:H1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A1:H1')->getFill()->getStartColor()->setARGB('C0C0C0');
}

//Lấy dữ liệu hóa đơn
if(isset($_REQUEST['bill'])) 
{
    $id = $_REQUEST['bill'];
    if($id == '-1')
    {   
        $fileName = 'Bill.xlsx'; //Đặt tên file''
        $condition = '1 = 1';
    }
    else{
        $condition = "id_Bill = '$id'";
        $fileName = 'Bill_'.$id.'.xlsx';
    }
    //Nhập dữ liệu header
    $sheet->setCellValue('A1','ID_Bill')
          ->setCellValue('B1','User')
          ->setCellValue('B2','Name')
          ->setCellValue('C2','Address')
          ->setCellValue('D2','Phone')
          ->setCellValue('E1','Product')
          ->setCellValue('E2','ID')
          ->setCellValue('F2','Name')
          ->setCellValue('G2','Color')
          ->setCellValue('H2','Size')
          ->setCellValue('I2','Amount')
          ->setCellValue('J2','Cost')
          ->setCellValue('K1','Total');
    $sheet->mergeCells('B1:D1')
          ->mergeCells('E1:J1')
          ->mergeCells('A1:A2')
          ->mergeCells('K1:K2');
    $key =1;
    $sql = "SELECT bill.id_Bill, 
    bill.Total, 
    bill.count, 
    bill.address,
    bill.note,
    bill.date,
    bill.status, 
    user.Name as us_name,
    user.Phone_Num as us_sdt,
    product.id_product as prod_id,
    product.Name as prod_name,
    product.Color as prod_color,
    product.Size as prod_size,
    product.Cost as prod_cost,
    product.Discount as prod_discount
    from bill 
    inner join user ON bill.id_us = user.id_user 
    inner join product on bill.id_sp = product.id_product
    WHERE $condition;";
    $result = $data->query($sql);
    while ($row = $result->fetch_assoc())
    {
        //Nhập dữ liệu từng dòng 
        $sheet->setCellValue('A'.($key +2),$row['id_Bill'])
              ->setCellValue('B'.($key +2),$row['us_name'])
              ->setCellValue('C'.($key +2),$row['address'])
              ->setCellValue('D'.($key +2),$row['us_sdt'])
              ->setCellValue('E'.($key +2),$row['prod_id'])
              ->setCellValue('F'.($key +2),$row['prod_name'])
              ->setCellValue('G'.($key +2),$row['prod_color'])
              ->setCellValue('H'.($key +2),$row['prod_size'])
              ->setCellValue('I'.($key +2),$row['count'])
              ->setCellValue('J'.($key +2),$row['prod_cost'] .'.000đ')
              ->setCellValue('K'.($key +2),$row['prod_cost'] * $row['count'] . '.000đ');
              $key++;
    }
    $sheet->getStyle('A1:K'.$key +1.)->applyFromArray($styleArray);//Set viền cho bảng
    //Set màu cho header
    $sheet->getStyle('A1:K2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $sheet->getStyle('A1:K2')->getFill()->getStartColor()->setARGB('C0C0C0');
}


//Lưu file 
$writer = new Xlsx($spredsheet);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="'.$fileName.'"');
$writer->save('php://output');
?>