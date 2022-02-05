<?php  

    if (!isset($_SESSION['USERID'])){
      redirect(web_root."index.php");
     }

 if (isset($_GET['id'])){
  @$ID = $_GET['id'];
  $setting = New Setting();
  $set = $setting->single_setting($ID);

 ?>
 

<form class="form-horizontal span6" action="controller.php?action=edit" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Set Delivery</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

 
            
                 <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "PLACE">Location:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="SETTINGID"  value="<?php echo $set->SETTINGID ?>">
                             <input class="form-control input-sm" id="PLACE" name="PLACE" placeholder=
                            "Location" type="text" value="<?php echo $set->PLACE ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "BRGY">Brgy:</label>

                      <div class="col-md-8">
                      <input  type="hidden" name="SETTINGID"  value="<?php echo $set->SETTINGID ?>">
                             <input class="form-control input-sm" id="BRGY" name="BRGY" placeholder=
                            "Location" type="text" value="<?php echo $set->BRGY ?>">
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "DELPRICE">Price:</label>

                      <div class="col-md-8">
                             <input class="form-control input-sm" id="DELPRICE" name="DELPRICE" placeholder=
                            "Delivery Price" type="text" value="<?php echo $set->DELPRICE ?>">
                      </div>
                    </div>
                  </div>

                
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
    
          
        </form>
      

       


 <?php }else{ ?>
 <form class="form-horizontal span6" action="controller.php?action=add" method="POST" enctype="multipart/form-data"    >
 <div class="row">
         <div class="col-lg-12">
            <h1 class="page-header">Set Delivery</h1>
          </div>
          <!-- /.col-lg-12 -->
       </div> 

                 <div class="form-group">
                   <div class="col-md-5">
                   <select name="province" id="province-dropdown" class="form-control"><option value="0">Province</option> </select>
                   </div>
                  </div>

                  <div class="form-group">
                   <div class="col-md-5">
                   <select name="district" id="district-dropdown" class="form-control"><option value="0">District</option> </select>
                   </div>
                  </div>
                  

                  <div class="form-group">
                   <div class="col-md-5">
                     <select name="sector" id="sector-dropdown" class="form-control"><option value="0">Sector</option> </select>
                                          
                   </div>
                  </div>


                  <div class="form-group">
                   <div class="col-md-5">
                   <select name="cell" id="cell-dropdown" class="form-control"><option value="0">Cell</option> </select>
                                          
                   </div>
                  </div>


                  <div class="form-group">
                   <div class="col-md-5">
                   <select name="village" id="village-dropdown" class="form-control"><option value="0">Village</option> </select>
                                          
                   </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-5">
                             <input class="form-control input-sm" id="DELPRICE" name="DELPRICE" placeholder=
                            "Delivery Price" type="text" value="">
                      
                       </div>
                  </div>

                
            
             <div class="form-group">
                    <div class="col-md-8">
                      <label class="col-md-4 control-label" for=
                      "idno"></label>

                      <div class="col-md-8">
                        <button class="btn  btn-primary btn-sm" name="save" type="submit" ><span class="fa fa-save fw-fa"></span> Save</button>
                      </div>
                    </div>
                  </div>

               
    
          
        </form>
      

       
<?php   }

?>


<script language="javascript" type="text/javascript">
        function OpenPopupCenter(pageURL, title, w, h) {
            var left = (screen.width - w) / 2;
            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
        } 


        let provinceSelector = document.querySelector('#province-dropdown');
let districtSelector = document.querySelector('#district-dropdown');
let sectorSelector = document.querySelector('#sector-dropdown');
let cellSelector = document.querySelector('#cell-dropdown');
let villageSelector = document.querySelector('#village-dropdown');

// fetch data
const url = '../../js/data.json';
fetch(url)
    .then((response) => {
        if (response.status !== 200) {
            console.log('Looks like there was a problem. Status Code: ' + response.status);
            return;
        }
        response.json().then((data) => {
            let option;
            let provinceKeys = Object.keys(data);
            for (let i = 0; i < provinceKeys.length; i++) {
                option = document.createElement('option');
                option.text = provinceKeys[i];
                option.value = provinceKeys[i];
                provinceSelector.add(option);
            }
            provinceSelector.addEventListener('change', (e) => allDistricts(data[e.target.value]));
        });
    })
    .catch((err) => {
        console.error('Fetch Error -', err);
    });

const allDistricts = (data) => {
    let districtKeys = Object.keys(data);
    districtSelector.innerHTML = '';
    for (let i = 0; i < districtKeys.length; i++) {
        option = document.createElement('option');
        option.text = districtKeys[i];
        option.value = districtKeys[i];
        districtSelector.add(option);
    }
    districtSelector.addEventListener('change', (e) => allSectors(data[e.target.value]));
};

const allSectors = (data) => {
    let sectorKeys = Object.keys(data);
    sectorSelector.innerHTML = '';
    for (let i = 0; i < sectorKeys.length; i++) {
        option = document.createElement('option');
        option.text = sectorKeys[i];
        option.value = sectorKeys[i];
        sectorSelector.add(option);
    }
    sectorSelector.addEventListener('change', (e) => allCells(data[e.target.value]));
};

const allCells = (data) => {
    let cellKeys = Object.keys(data);
    cellSelector.innerHTML = '';
    for (let i = 0; i < cellKeys.length; i++) {
        option = document.createElement('option');
        option.text = cellKeys[i];
        option.value = cellKeys[i];
        cellSelector.add(option);
    }
    cellSelector.addEventListener('change', (e) => allVillages(data[e.target.value]));
};

const allVillages = (data) => {
    villageSelector.innerHTML = '';
    for (let i = 0; i < data.length; i++) {
        option = document.createElement('option');
        option.text = data[i];
        option.value = data[i];
        villageSelector.add(option);
    }
};
    </script>





