<?php
session_start();
$ja_en = (isset($_SESSION["ja_en"])) ? $_SESSION["ja_en"] : 'Ja_En';
$ja_en_sec = (isset($_SESSION["ja_en_sec"])) ? $_SESSION["ja_en_sec"] : 15;
$ja_en_no = isset($_SESSION["ja_en_no"]) ? $_SESSION["ja_en_no"] : 10;
$en_ja = (isset($_SESSION["en_ja"])) ? $_SESSION["en_ja"] : 'En_Ja';
$en_ja_sec = (isset($_SESSION["en_ja_sec"])) ? $_SESSION["en_ja_sec"] : 15;
$en_ja_no = (isset($_SESSION["en_ja_no"])) ? $_SESSION["en_ja_no"] : 10;
$kan_ja = (isset($_SESSION["kan_ja"])) ? $_SESSION["kan_ja"] : 'Kan_Ja';
$kan_ja_sec = (isset($_SESSION["kan_ja_sec"])) ? $_SESSION["kan_ja_sec"] : 15;
$kan_ja_no = (isset($_SESSION["kan_ja_no"])) ? $_SESSION["kan_ja_no"] : 5;
$kan_en = (isset($_SESSION["kan_en"])) ? $_SESSION["kan_en"] : 'Kan_en';
$kan_en_sec = (isset($_SESSION["kan_en_sec"])) ? $_SESSION["kan_en_sec"] : 15;
$kan_en_no = (isset($_SESSION["kan_en_no"])) ? $_SESSION["kan_en_no"] : 5;
$lesson = (isset($_SESSION["lesson"])) ? $_SESSION["lesson"] : '';
$section = (isset($_SESSION["section"])) ? $_SESSION["section"] : 'japanese';
$te_st = (isset($_SESSION["te_st"])) ? $_SESSION["te_st"] : '1';
$te_end = (isset($_SESSION["te_end"])) ? $_SESSION["te_end"] : '10';
$chk_ja_en = ($ja_en=="Ja_En") ? 'checked' : '' ;
$chk_en_ja = ($en_ja=="En_Ja") ? 'checked' : '' ;
$chk_kan_ja = ($kan_ja=="Kan_Ja") ? 'checked' : '' ;
$chk_kan_en = ($kan_en=="Kan_En") ? 'checked' : '' ;
?>
<!DOCTYPE html>
<html>
<head> 
 
<style>

body {
  background: #ccc !important;
  font-family: Indie Flower, sans-serif !important;
}

#reset {
  text-align: center;
}
#reset button {
  background: rgba(0, 0, 0, 0.4);
  border: 0;
  color: white;
  font-size: 12pt;
  margin: auto;
  width: 120px;
  height: 30px;
}
#reset button:active {
  background: rgba(0, 0, 0, 0.8);
}

#stack {
  margin: auto;
  position: relative;
  width: 300px;
}

.card {
  border: 1px solid #888 !important;
  position: absolute;
  width: 500px;
  height: 300px;
  transform-origin: 0% 0% !important;
  webkit-box-sizing: content-box !important;
  box-sizing: content-box !important;
}
.card .front {
  background: white !important;
  font-size: 30pt;
  position: absolute;
  width: 500px;
  height: 300px;
  z-index: 2;
}
.card .front p {
   margin-top:12%;
  text-align: center;

}
.card .back {
  background: white linear-gradient(transparent, transparent 20%, hotpink 20%, hotpink 21%, transparent 21%, transparent 42%, lightblue 42%, lightblue 43%, transparent 43%, transparent 64%, lightblue 64%, lightblue 65%, transparent 65%, transparent 75%, transparent 86%, lightblue 86%, lightblue 87%, transparent 87%, transparent 97%);
  font-size: 25pt;
  position: absolute;
  width: 500px;
  height: 300px;
  transform: rotateY(180deg);
  z-index: 1;
}
.card .back p {
  line-height: 2em;
  margin: 70px 5px 5px 5px;
}

._1 {
  top: 0px;
  left: 150px;
}

._2 {
  top: 3px;
  left: 152px;
}

._3 {
  top: 6px;
  left: 154px;
}

._4 {
  top: 9px;
  left: 156px;
}

.flipped {
  transform: rotateY(180deg) translateX(30px);
  animation: flip 1s;
}

.reflipped {
  transform: rotateX(0deg) translateX(0px);
  animation: reflip 1s;
} 

.showingBack {
  animation: showBack 1s;
}

.actbtn a {
  background-color: red !important;
  box-shadow: 0 5px 0 darkred !important;
  color: white !important;
  padding: .6em 2em !important;
  margin: 1em 1em !important;
  position: relative !important;
  text-decoration: none !important;
  text-transform: uppercase !important;
}

.actbtn a:hover {
  background-color: #ce0606 !important;
}

.actbtn a:active {
  box-shadow: none !important;
  top: 5px !important;
}

@keyframes flip {
  from {
    transform: rotateY(0deg) translateX(0px);
  }
  to {
    transform: rotateY(180deg) translateX(30px);
  }
}
@keyframes reflip {
  from {
    transform: rotateY(180deg) translateX(30px);
  }
  to {
    transform: rotateX(0deg) translateX(0px);
  }
}
@keyframes showBack {
  0% {
    z-index: 2;
  }
  25% {
    z-index: 2;
  }
  50% {
    z-index: 0;
  }
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!-- Include the multiselect plugin's CSS and JS: -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.min.js"></script>
  <script>
$(function(){
  $('.front').click(function(){
    timm = -1;
    var id = $(this).data('id');
    $(this).parent().addClass('flipped');
    $(this).parent().removeClass('reflipped');
    $(this).addClass('showingBack');
    $(this).css("z-index", 0);
    $(this).parent().css("z-index", id);

    // timer activate
    var sec_new = $(this).data('sec');
    if(sec_new != '') {
      timeouts.forEach(clearInterval);
      clearInterval(myInterval);
      timm = $(this).data('sec');;
      $('#pause_ind').val(id);
      start_slideshow();
      start_timer();
    }
  });

   $('.back').click(function(){
    timm = -1;
    var id = $(this).data('id');
    $(this).parent().removeClass('flipped');
    $(this).parent().addClass('reflipped');
    $(this).parent().find('.front').css("z-index", 2);
    $(this).parent().css("z-index", id);
  });

   $('.multiselect')
    .multiselect({
      allSelectedText: 'All Lessons',
      maxHeight: 200,
      includeSelectAllOption: true,
      nSelectedText: ' - Lessons',
      enableHTML:true,
      selectedClass:'active'
    })

    $('.frmSubmit').click(function() {
    var ja_en = $("#ja_en").is(":checked") ? 'Ja_En' : '';
    var ja_en_sec = $("#ja_en_sec").val();
    var ja_en_no = $("#ja_en_no").val();
    var en_ja = $("#en_ja").is(":checked") ? 'En_Ja' : '';
    var en_ja_sec = $("#en_ja_sec").val();
    var en_ja_no = $("#en_ja_no").val();
    var kan_ja = $("#kan_ja").is(":checked") ? 'Kan_Ja' : '';
    var kan_ja_sec = $("#kan_ja_sec").val();
    var kan_ja_no = $("#kan_ja_no").val();
    var kan_en = $("#kan_en").is(":checked") ? 'Kan_En' : '';
    var kan_en_sec = $("#kan_en_sec").val();
    var kan_en_no = $("#kan_en_no").val();
    var lesson = $("#lesson").val();
    var section = $("input[name='section']:checked").val();
    var te_st = $("#te_st").val();
    var te_end = $("#te_end").val();
    $.ajax({
    type: 'GET',
    url: 'session.php',
    data: {
        ja_en: ja_en,
        ja_en_sec: ja_en_sec,
        ja_en_no: ja_en_no,
        en_ja: en_ja,
        en_ja_sec: en_ja_sec,
        en_ja_no: en_ja_no,
        kan_ja: kan_ja,
        kan_ja_sec: kan_ja_sec,
        kan_ja_no: kan_ja_no,
        kan_en: kan_en,
        kan_en_sec: kan_en_sec,
        kan_en_no: kan_en_no,
        lesson: lesson,
        section: section,
        te_st: te_st,
        te_end: te_end
      },
      success: function(result) {
        if(result=="Success"){
        location.reload();
        }
      }
    })
    });
    
  $("input[name='section']").click(function(){
    if($("#japanese").is(':checked')) {
      $(".lesson").show();  // checked
      $(".se_li").hide();
    }
    else {
      $(".lesson").hide();
      $(".se_li").show();  // unchecked
    }
  });

  setTimeout(function() {
    timm = $(".front").data('sec')-1;
    start_slideshow();
    start_timer();
  }, 1);
  
  $(".pause").click(function(){
    timeouts.forEach(clearInterval);
    clearInterval(myInterval);
    $('#pause_ind').val($('#crt_ind').val());
    $(".resume").show();
    $(".pause").hide();
  });
  $(".resume").click(function(){
    start_slideshow();
    start_timer();
    $(".pause").show();
    $(".resume").hide();
  });
}); 


var timm;
var myInter;
var timeouts = [];
var myInterval;
function start_slideshow()
{
  var outSec = 0;
  $($(".front").get().reverse()).each(function (i,e) {
    var pause_ind = $('#pause_ind').val();
    if(i>=pause_ind) {
      var sec_new = $(e).data('sec');
      if(sec_new != '') {
        var intSec = sec_new * 1000;
        if(i == pause_ind) {
          intSec = (timm + 1) * 1000;
        }
        outSec += intSec;

        var t = setTimeout(function() {
         timm = sec_new;
          var id = $(e).data('id');
          $(e).parent().addClass('flipped');
          $(e).parent().removeClass('reflipped');
          $(e).addClass('showingBack');
          $(e).css("z-index", 0);
          $(e).parent().css("z-index", id);
          $('#crt_ind').val(i+1);
          setInterval(function() {
          }, intSec);
        }, outSec);
        timeouts.push(t);
      }
    }
  });
}

function start_timer()
{
  myInterval = window.setInterval(function(){
    $(".front span").html(Math.abs(timm--));
  }, 1000);
}
    
  </script>
</head>
<body>
<h2>
Vacabulary Test:
</h2>

<div id='stack'>
<?php 
  $connect = mysqli_connect("localhost", "root", "6NCS9sugevh5", "japanese");
  $leSql = 'SELECT DISTINCT lesson FROM vocabulary ORDER BY lesson ASC';
  $leResult=mysqli_query($connect, $leSql);

  if(!is_array($lesson))
    $lesson = array(1);

    $lessons = join("','",$lesson); 
  
  if(!$ja_en)
    $ja_en_no = 0;
  if(!$en_ja)
    $en_ja_no = 0;
  if(!$kan_ja)
    $kan_ja_no = 0;
  if(!$kan_en)
    $kan_en_no = 0;

  $noVoc = (int)$ja_en_no + (int)$en_ja_no;
  $noKan = (int)$kan_ja_no + (int)$kan_en_no;
  if($section=="japanese") {
    if ($noVoc > 0 && $noKan > 0) {
      $sql = "SELECT * FROM (SELECT * FROM vocabulary WHERE kanji != '' AND lesson IN ('$lessons') ORDER BY RAND() LIMIT $noKan) AS a UNION ALL SELECT * FROM (SELECT * FROM vocabulary WHERE lesson IN ('$lessons') ORDER BY RAND() LIMIT $noVoc) AS b";
    } else if ($noKan > 0) {
      $sql = "SELECT * FROM vocabulary WHERE kanji != '' AND lesson IN ('$lessons') ORDER BY RAND() LIMIT ".$noKan;
    }
    else {
      $sql = "SELECT * FROM vocabulary WHERE lesson IN ('$lessons') ORDER BY RAND() LIMIT ".$noVoc;
    }
  } else {
    if($te_st!="" && $te_end!="") {
      $sql = "SELECT * FROM (SELECT * FROM vocabulary WHERE lesson = '100' ORDER BY Id LIMIT ".($te_st-1).",".($te_end-$te_st+1).") AS A ORDER BY RAND() LIMIT 0,".($noVoc+$noKan);
    } else {
      $sql = "SELECT * FROM vocabulary WHERE lesson = '100' ORDER BY RAND() LIMIT 0,".($noVoc+$noKan);
    }
  }
  $result=mysqli_query($connect, $sql);
  $i=1;$j=1;
  $cnt=mysqli_num_rows($result);
  if($cnt > 0){  
   while($row = mysqli_fetch_assoc($result)){
   if($noKan > 0 && $j <=  $noKan) {
    if ($j<= $kan_en_no) {
        $que =  $row['kanji'];
        $ans =  $row['meaning'];
        $intvl = $kan_en_sec;
        $hint = "Meaning?";
      } else {
        $que =  $row['kanji'];
        $ans =  $row['vocabulary'];
        $intvl = $kan_ja_sec;
        $hint = "Hirakana?";
      }
    } else if($noVoc > 0) {
      if ($j<=  $noKan+$en_ja_no) {
        $que =  $row['meaning'];
        $ans =  $row['vocabulary'];
        $intvl =  $en_ja_sec;
        $hint = "Hirakana?";
      } else {
        $que =  $row['vocabulary'];
        $ans =  $row['meaning'];
        $intvl = $ja_en_sec;
        $hint = "Meaning?";
      }
    }
    ?>
    <div class='card _<?php echo $i; ?>' style="z-index:<?php echo $j; ?>">
      <div class='front' data-id='<?php echo $cnt; ?>' data-sec='<?php echo $intvl; ?>'>
        <b style="font-size: 14pt;margin-left:15px;color: hotpink">No : <?php echo $cnt; ?></b>
        <b style="font-size: 14pt;margin-left:15px;color: red">Sec : </b>
        <b><span style="font-size: 14pt;margin-left:15px;color: red"><?php echo ($intvl) ? $intvl : 0; ?> </span></b>
        <b style="font-size: 14pt;margin-left:15px;color: black"><?php echo $hint; ?></b>
        <p><?php echo $que; ?></p>
      </div>
      <div class='back' data-id='<?php echo $j; ?>'>
        <p><?php echo $ans; ?></p>
      </div>
    </div>
      
   <?php $i++;$j++;$cnt--;if($i==5){$i=1;}} //end of while  
  } 
?>
</div>
<div class="actbtn" style="margin-top:32%;text-align: center; "> 
<a class="reasonPop" href="javascript:void(0);" data-toggle="modal" data-target="#settingForm"><i class="fas fa-times"></i> Setting</a><a class="" href="">Refresh</a><a class="pause" href="javascript:void(0);"><i class="fas fa-times"></i> Pause</a><a class="resume" style="display:none;" href="javascript:void(0);"><i class="fas fa-times"></i> Resume</a>
</div>
<div class="modal fade" id="settingForm" tabindex="-1" role="dialog" aria-labelledby="settingFormTitle" aria-hidden="true">
    <form role="form" method="post" name="frmSetting" id="frmSetting" action="/index.php" class="form-horizontal">
      <input type="hidden" name="crt_ind" id="crt_ind" value="0">
      <input type="hidden" name="pause_ind" id="pause_ind" value="0">
      <input type="hidden" name="reportid" id="reportid" value="<?php echo $rid;?>">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLongTitle"><b>Flash Card Settup</b>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </h4>
          </div>
          <div class="modal-body">
            <input type="radio" id="japanese" name="section"
            <?php if ($section=="japanese") echo "checked";?>
            value="japanese"><label>&ensp;Japanese&ensp; </label>
            <input type="radio" id="technical" name="section"
            <?php if ($section=="technical") echo "checked";?>
            value="technical"><label>&ensp;Technical</label><br>
            <div class="lesson" style="<?php if ($section=="technical") echo "display:none;";?>">
              <label for="lesson" style="width: 188px;"> Lesson</label>
              <select class="multiselect" id="lesson" name="lesson" multiple="multiple">
                <?php 
                while($leRow = mysqli_fetch_assoc($leResult)){
                  if(in_array($leRow['lesson'], $lesson))
                    echo $selected = "selected='selected'";
                  else
                    echo $selected = "";

                  if($leRow['lesson']!="100") {
                  ?>
                <option value="<?php echo $leRow['lesson'];?>" <?php echo $selected;?>>Lesson <?php echo $leRow['lesson'];?></option>
              <?php }} ?>
              </select>
            </div>
            <div class="se_li" style="<?php if ($section=="japanese") echo "display:none;";?>">
              <label for="se_li" style="width: 188px;"> Select Limit</label>
              <input type="number" style="width: 4em;" id="te_st" name="te_st" value="<?php echo $te_st; ?>">
              <label for="te_st"> Start</label>
              <input type="number" style="width: 4em;" id="te_end" name="te_end" value="<?php echo $te_end; ?>">
              <label for="te_end"> End</label>
            </div><br>
            <input type="checkbox" id="ja_en" name="ja_en" <?php echo $chk_ja_en;?>>
            <label for="ja_en" style="width: 170px;"> Hirakana - Meaning</label>
            <input type="number" style="width: 4em;" id="ja_en_sec" name="ja_en_sec" value="<?php echo $ja_en_sec; ?>">
            <label for="ja_en_sec" style="width: 37px;"> Sec</label>
            <input type="number" style="width: 4em;" id="ja_en_no" name="ja_en_no" value="<?php echo $ja_en_no; ?>">
            <label for="ja_en_no"> No</label><br>
            <input type="checkbox" id="en_ja" name="en_ja" <?php echo $chk_en_ja;?>>
            <label for="en_ja" style="width: 170px;"> Meaning - Hirakana</label>
            <input type="number" style="width: 4em;" id="en_ja_sec" name="en_ja_sec" value="<?php echo $en_ja_sec; ?>">
            <label for="en_ja_sec" style="width: 37px;"> Sec</label>
            <input type="number" style="width: 4em;" id="en_ja_no" name="en_ja_no" value="<?php echo $en_ja_no; ?>">
            <label for="en_ja_no"> No</label><br>
            <input type="checkbox" id="kan_ja" name="kan_ja" <?php echo $chk_kan_ja;?>>
            <label for="kan_ja" style="width: 170px;"> Kanji - Hirakana</label>
            <input type="number" style="width: 4em;" id="kan_ja_sec" name="kan_ja_sec" value="<?php echo $kan_ja_sec; ?>">
            <label for="kan_ja_sec" style="width: 37px;"> Sec</label>
            <input type="number" style="width: 4em;" id="kan_ja_no" name="kan_ja_no" value="<?php echo $kan_ja_no; ?>">
            <label for="kan_ja_no"> No</label><br>
            <input type="checkbox" id="kan_en" name="kan_en" <?php echo $chk_kan_en;?>>
            <label for="kan_en" style="width: 170px;"> Kanji - Meaning</label>
            <input type="number" style="width: 4em;" id="kan_en_sec" name="kan_en_sec" value="<?php echo $kan_en_sec; ?>">
            <label for="kan_en_sec" style="width: 37px;"> Sec</label>
            <input type="number" style="width: 4em;" id="kan_en_no" name="kan_en_no" value="<?php echo $kan_en_no; ?>">
            <label for="kan_en_no"> No</label><br><br>
          </div>
          <div class="modal-footer mx-auto">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" name="submit" id="submit" value="CSubmit" data-dismiss="modal" class="frmSubmit btn btn-primary">Finish</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</body>
</html>