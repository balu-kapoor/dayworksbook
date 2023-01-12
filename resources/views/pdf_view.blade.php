<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: sans-serif;
  }
  h3 {
    text-transform: uppercase;
    margin-top: 3rem;
  }
#document {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#document td, #document th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
}

#document tr:nth-child(even){background-color: #f2f2f2;}

#document tr:hover {background-color: #ddd;}

#document th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(225, 138, 34, 1);
  font-size: 15px;
  color: white;
}
#document2 {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#document2 td, #document2 th {
  border: 1px solid #ddd;
  padding: 8px;
  font-size: 14px;
}

#document2 tr:nth-child(even){background-color: #f2f2f2;}

#document2 tr:hover {background-color: #ddd;}

#document2 th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(225, 138, 34, 1);
  font-size: 15px;
  color: white;
}
#pdf_img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.card-body {
    margin: 0 3rem;
}
footer div {
    width: 50%;
    float: left;
    margin-top: 2rem;
}
table#header {
    border: 1px solid;
    padding: 1rem;
    width: 100%;
}
table#header tr {
  text-align: left;
}
</style>
</head>
<body>

<div class="card-body">
  <img id="pdf_img" src="./images/logo.png" alt="">        
  <div class="table-responsive">
    <table id="header" class="table table-striped" style="">     
      <tbody>    
        <tr>
          <th>Job/Site name: </th>
          <td>
              {{ $job[0] ?? ''}}
          </td>
          <th>
            Date: 
          </th>
          <td>
          {{ $job[1] ?? ''}}
          </td>          
        </tr> 
        <tr>
          <th>Client: </th>
          <td>
          {{ $job[2] ?? ''}}
          </td>                   
          <th>Smart Jobs Number: </th>     
          <td>{{ $job[3] ?? ''}}</td>            
        </tr>   
        <tr>
          <th>Works: </th>
          <td style="word-break: break-all;width: 100%">{{ $job[4] ?? ''}}</td>
        </tr>
      </tbody>
    </table>
    <h3>DAY LABOUR</h3>
    <table id="document" class="table table-striped" style="">
      <thead>
        <tr>                  
          <th>Name</th>
          <th>Hours</th>
        </tr>
      </thead>
      <tbody>
    
        <tr>
         <td>James Vaugh</td>
         <td>50</td>
        </tr>
        <tr>
         <td>john</td>
         <td>70</td>
        </tr>   
      </tbody>
    </table>
    <h3>Materials</h3>
    <table id="document2" class="table table-striped" style="">
      <thead>
        <tr>                  
          <th>Description</th>
          <th>Qty</th>
        </tr>
      </thead>
      <tbody>
    
        <tr>
         <td>Cement</td>
         <td>50</td>
        </tr>
        <tr>
         <td>Concrete</td>
         <td>100 sqft</td>
        </tr>   
      </tbody>
    </table>
    <footer>
      <div>
        <p>Prepared for {{ $job[9] ?? ''}} by:  {{ $job[8] ?? ''}}</p>
        <p>Signature: </p>
      </div>
      <div>
        <p>Client: {{ $job[6] ?? ''}} </p>
        <p>Client title/position: {{ $job[7] ?? ''}}</p>
        <p>Signature: </p>
      </div>
    </footer>
  </div>
</div>

</body>
</html>


