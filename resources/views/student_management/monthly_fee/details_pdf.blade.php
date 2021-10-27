<!DOCTYPE html>
<html>

<head>
   <style>
      table {
         border-collapse: collapse;
         width: 100%;
      }

      th,
      td {
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      .center {
         text-align: center;
         margin: auto;
         width: 50%;
         padding: 10px;
         margin-top: -20px;
      }

      .tablee {
         border-collapse: collapse;
         border-bottom: 0px solid floralwhite;

      }

      .info1,
      .info2 {
         padding: 10px;
         border-bottom: 0px solid floralwhite;
         text-align: center;
      }

      @page {
         header: page-header;
         footer: page-footer;
      }
   </style>
</head>

<body>
   @php
   $image_src = '/upload/logo.png'
   @endphp
   <htmlpageheader name="page-header">
      <img src="{{ public_path().$image_src}}" alt="logo" height="75px" width="75px" style="float:right">
      <div class="center">
         <h2>Monthly Fee </h2>
      </div>
   </htmlpageheader>


   <div class="row" style="float: left;">
      <div class="col-lg-6">
         <span style="float: left;">Hamma School</span><br>
         <span>Cité 222 logs,Algerie</span><br>
         <span>0782042749</span><br>
         <span>school.hamma@gmail.com</span><br><br>
      </div>
      
      <table class=".tablee">
         <tr class="info1">
            <td class="info2" style="text-align: left;">Student Name : {{ $details->student->name}}</td>
            <td class="info2" style="text-align: left;">Student Matricule : {{ $details->student->id_no}}</td>
         </tr>
         <tr class="info1">
            <td class="info2" style="text-align: left;">Mather Name : {{ $details->student->mname}}</td>
            <td class="info2" style="text-align: left;">Father Name : {{ $details->student->fname}}</td>
         </tr>
         <tr class="info1">
            <td class="info2" style="text-align: left;">Student Mobile : {{ $details->student->mobile}}</td>
            <td class="info2" style="text-align: left;">Student Adress : {{ $details->student->adress}}</td>
         </tr>
         <tr class="info1">
            <td class="info2" style="text-align: left;">Student Class : {{ $details->student_class->name}}</td>
            <td class="info2" style="text-align: left;">Student Year : {{ $details->student_year->name}}</td>
         </tr>
         <tr class="info1">
            <td class="info2" style="text-align: left;">Student Group : {{ $details->student_group->name}}</td>
            <td class="info2" style="text-align: left;">Student DOBirth : {{ $details->student->dob}}</td>
         </tr>
      </table>
   </div>

   @php
   $discount = rand(5,10);
   $Registration_fee = App\Models\FeeAmount::where('fee_category_id', '2')->where('class_id', $details->class_id)->first();
   $originalFee = $Registration_fee->amount;
   $discounttablefee = $discount / 100 * $originalFee;
   $finalfee = (float)$originalFee - (float)$discounttablefee;
   @endphp
   <br><br>
   <table>
      <tr>
         <th style="text-align: left;">Name </th>
         <th style="text-align: left;">Fee </th>
      </tr>
      <tr class="info1">
         <td style="text-align: left;" class="info2">Discount Fee</td>
         <td style="text-align: left;" class="info2"> {{$discount}} %</td>
      </tr>
      <tr class="info1">
         <td style="text-align: left;">Monthly Fee</td>

         <td style="text-align: left;">{{$originalFee}} $ </td>
      </tr>

      <tr class="info1">

         <td style="text-align: center;" class="info2">Total Fee for <strong>{{$month}}</strong>: </td>
         <td style="text-align: left;" class="info2"> {{$finalfee}} $</td>
      </tr>
   </table>

   <htmlpagefooter name="page-footer">
      <hr>
      <i>Print Date : {{date("Y-h-m h:i")}}</i>
   </htmlpagefooter>
</body>

</html>