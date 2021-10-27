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
   </style>
</head>

<body>
   <div class="center">
      <h2>Informations Carte</h2>
   </div>
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
               <td class="info2" style="text-align: left;">Mather's Name : {{ $details->student->mname}}</td>
               <td class="info2" style="text-align: left;">Father's Name : {{ $details->student->fname}}</td>
            </tr>
            <tr class="info1">
               <td class="info2" style="text-align: left;">Mather's Name : {{ $details->student->mname}}</td>
               <td class="info2" style="text-align: left;">Father's Name : {{ $details->student->fname}}</td>
            </tr>
            <tr class="info1">
               <td class="info2" style="text-align: left;">Mather's Name : {{ $details->student->mobile}}</td>
               <td class="info2" style="text-align: left;">Father's Name : {{ $details->student->adress}}</td>
            </tr>
         </table>
   </div>


   <br><br>
   <table>
      <tr>
         <th style="text-align: left;">Name </th>
         <th style="text-align: left;">Fee  </th>
      </tr>
      <tr>
         <td style="text-align: left;">Fee Amount </td>
         <td style="text-align: left;"> 300$</td>
      </tr>
      <tr>
         <td style="text-align: left;">Discount </td>
         <td style="text-align: left;">{{ $details->discount->discount}}%</td>
      </tr>

      <tr>
         <td style="text-align: center;" class="info2">Total: </td>
         <td style="text-align: right;" class="info2">{{ $details->discount->discount*300}} $</td>
      </tr>
   </table>

   <br><br><br>

</body>

</html>