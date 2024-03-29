<?php 
/* 
    * Template Name: custom dropdown
*/
get_header(); 
?>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=News+Cycle:400,700" rel="stylesheet">
    <style>
  
.translate_wrapper{
  position:fixed;
  z-index:1;
  top:20px;
  left:20px;
  font-size:16px;
  background:#fff;  
  border-radius:4px;
}

.current_lang{
  cursor:pointer;
  text-transform:uppercase;
  overflow:hidden;
}

.lang{
    padding:10px 15px;
}

.lang.selected{
  display:none;
}

.lang img, 
.lang span.lang-txt{
  display:inline-block;
  margin-left:5px;
  vertical-align:middle;
}

.lang span.lang-txt{
   position:relative;
  top:-1px;
  font-weight:700;
}

.lang img{
  width:20px;
  margin-left:0;
}

.lang span span{
  color:#999;
  font-weight:400;
}

.lang span.fa{
  font-size:12px;
  position:relative;
  top:-1px;
  margin-left:3px;
}


/*more lang*/
.more_lang{
  transform:translateY(-20px);
  opacity:0;
  cursor:pointer;
  display:none;
   -webkit-transition: all .3s cubic-bezier(.25, 1.15, .35, 1.15);
	-moz-transition:    all .3s cubic-bezier(.25, 1.15, .35, 1.15);
	-o-transition:      all .3s cubic-bezier(.25, 1.15, .35, 1.15);
	-ms-transition:     all .3s cubic-bezier(.25, 1.15, .35, 1.15);
	transition:         all .3s cubic-bezier(.25, 1.15, .35, 1.15);
}

.translate_wrapper.active .more_lang{
  display:block; 
}

.more_lang.active{
  opacity:1;
   transform:translateY(-0px);
}

.more_lang .lang:hover{
  background:#5766b2;
  color:#fff;
}

.more_lang .lang:hover span{
  color:#fff;
}

.translate_wrapper:hover,
.translate_wrapper.active,
.content a:hover{
  box-shadow:rgba(0,0,0,0.2) 0 5px 15px;  
  -webkit-transition: all 0.3s cubic-bezier(0,.99,.44,.99);
	-moz-transition:    all 0.3s cubic-bezier(0,.99,.44,.99);
	-o-transition:      all 0.3s cubic-bezier(0,.99,.44,.99);
	-ms-transition:     all 0.3s cubic-bezier(0,.99,.44,.99);
	transition:         all 0.3s cubic-bezier(0,.99,.44,.99);
  
}

.translate_wrapper.active .lang{
  border-bottom:1px solid #eaeaea;
}

/*CONTENT*/
.content{
  width:100%;
  max-width:400px;
  position:absolute;
  top:50%;
  left:50%;
  -ms-transform: translateX(-50%) translateY(-50%);
  -webkit-transform: translate(-50%,-50%);
  transform: translate(-50%,-50%);
  border-radius:2px;
  padding:20px;
  -webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
  
  text-align:center;
}

.content h1, 
.content h2, 
.content p{
  margin:0;
}

.content p{
   line-height:22px;
  text-align:left;
  margin-top:15px;
}


.content div.ct-img{
  width:150px;
  height:150px;
  overflow:hidden;
  border-radius:50%;
  margin:0 auto 10px;
}

.content div img{
  height:100%;
  position:relative;
  left:-30px;
}

.content a{
  padding: 8px 15px 10px;
   border-radius:4px;
  background:#5766b2;
  color:#fff;
  text-decoration:none;
  display:inline-block;
  margin-top:25px;
  position:relative;
  overflow:hidden;
}

.content a:active{
  transform: scale(0.9);
   -webkit-transform: scale(0.9);
  -moz-transform: scale(0.9);
}

    </style>
    <div class="translate_wrapper">
        <div class="current_lang">
            <div class="lang">
                <img src="https://image.flaticon.com/icons/svg/299/299722.svg">
                <span class="lang-txt">EN</span> 
                <span class="fa fa-chevron-down chevron"></span>
            </div>
        </div>
      
    
        <div class="more_lang">

            <div class="lang" data-value='cn'>
                <img src="https://image.flaticon.com/icons/svg/299/299914.svg">
                <span class="lang-txt">简体中文</span>      
            </div>
            
            <div class="lang selected" data-value='en'>
                <img src="https://image.flaticon.com/icons/svg/299/299722.svg">
                <span class="lang-txt">English<span> (US)</span></span>      
            </div>
            
            
            <div class="lang" data-value='de'>
                <img src="https://image.flaticon.com/icons/svg/299/299786.svg">
                <span class="lang-txt">Deutsch</span>      
            </div>
            
            <div class="lang" data-value='es'>
                <img src="https://image.flaticon.com/icons/svg/299/299820.svg">
                <span class="lang-txt">Español</span>      
            </div>  
            
            
            <div class="lang" data-value='fr'>
                <img src="https://image.flaticon.com/icons/svg/299/299753.svg">
                <span class="lang-txt">Français</span>      
            </div>
            
            
            <div class="lang" data-value="pt">
                <img src="https://image.flaticon.com/icons/svg/299/299693.svg">
                <span class="lang-txt">Português<span> (BR)</span></span>      
            </div> 
            
            <div class="lang" data-value="ar">
                <img src="https://image.flaticon.com/icons/svg/299/299815.svg">
                <span class="lang-txt">العربية <span> (SA)</span></span>      
            </div> 
        
        </div>

     </div>
  
  
  <div class="content">
    <div class="ct-img">
      <img src="https://traceyrickard.co.uk/wp-content/uploads/2015/09/lizard-765x510.jpg">
    </div>

    <div class="ct-txt">
      <h1></h1>
      <p></p>
      <a href="#"><span>Link</span></a>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>
      var tnum = 'en';

jQuery(document).ready(function(){
  
    jQuery(document).click( function(e) {
        jQuery('.translate_wrapper, .more_lang').removeClass('active');     
    });
  
    jQuery('.translate_wrapper .current_lang').click(function(e){    
    e.stopPropagation();
        jQuery(this).parent().toggleClass('active');
    
    setTimeout(function(){
      jQuery('.more_lang').toggleClass('active');
    }, 5);
  });
  

  /*TRANSLATE*/
  translate(tnum);
  
  jQuery('.more_lang .lang').click(function(){
    jQuery(this).addClass('selected').siblings().removeClass('selected');
    jQuery('.more_lang').removeClass('active');  
    
    var img = jQuery(this).find('img').attr('src');    
    var lang = jQuery(this).attr('data-value');
    var tnum = lang;
    translate(tnum);
    
    jQuery('.current_lang .lang-txt').text(lang);
    jQuery('.current_lang img').attr('src', img);
    
  });
});

function translate(tnum){
  $('h1').text(trans[0][tnum]);
  $('p').text(trans[1][tnum]);
  $('.content a span').text(trans[2][tnum]);
}

var trans = [ 
  { 
    en : 'Chameleon',
    pt : 'Camaleão',
    es : 'Camaleón',
    fr : 'Caméléon',
    de : 'Chamäleon', 
    cn : '变色龙',
    ar : 'حرباء'
  },{ 
    en : 'For sheer breadth of freakish anatomical features, the chameleon has few rivals. A tongue far longer than its body, shooting out to snatch insects in a fraction of a second. Telescopic-vision eyes that swivel independently in domed turrets. Feet with toes fused into mitten-like pincers. Horns sprouting from brow and snout. Knobbly nasal ornaments. A skin flap circling the neck like a lace ruff on an Elizabethan noble.',
    pt : 'Por uma infinidade de características anatômicas, o camaleão tem poucos rivais. Uma língua muito mais longa do que o seu corpo, disparando para pegar insetos em uma fração de segundo. Olhos de visão telescópica que giram de forma independente em torres com abóbadas. Pés com os dedos fundidos em pinças tipo luva. Chifres brotando da sobrancelha e do focinho. Ornamentos nasais knobbly. Uma aba de pele que circunda o pescoço como uma barriga de renda em um nobre isabelino.',
    es : 'Por pura amplitud de extrañas características anatómicas, el camaleón tiene pocos rivales. Una lengua mucho más larga que su cuerpo, disparando para atrapar insectos en una fracción de segundo. Ojos de visión telescópica que giran independientemente en las torretas abovedadas. Pies con dedos de los pies fusionados en pinzas tipo mitones. Cuernos que brotan de la frente y el hocico. Adornos nasales nudosos. Una aleta de piel que rodea el cuello como una puntilla de encaje sobre un noble isabelino.',
    fr: "Pour l'ampleur pure des caractéristiques anatomiques bizarres, le caméléon a peu de rivaux. Une langue bien plus longue que son corps, tirant pour arracher les insectes en une fraction de seconde. Yeux à vision télescopique pivotant indépendamment dans des tourelles à dôme. Pieds avec les orteils fondus dans des tenailles mitaines. Cornes qui poussent du front et du museau. Ornements nasaux Knobbly. Un lambeau de peau entourant le cou comme une collerette de dentelle sur un noble élisabéthain.",
    de: 'Wegen der schieren Breite der anatomischen Besonderheiten hat das Chamäleon wenige Rivalen. Eine Zunge, die viel länger ist als ihr Körper und in einem Bruchteil einer Sekunde Insekten erjagt. Teleskopische Augen, die unabhängig voneinander in Kuppeltürmen schwenken. Füße mit Zehen verschmolzen zu handschuhartigen Zangen. Hörner sprießen von der Stirn und der Schnauze. Knoblige Nasenverzierungen. Ein Hautlappen umkreist den Hals wie ein Spitzenkragen an einem elisabethanischen Adligen.',
    cn: '由于极其奇特的解剖特征，变色龙几乎没有对手。一只比它的身体长得多的舌头，在几分之一秒内射出来抓住昆虫。在圆顶炮塔中独立旋转的望远镜视力眼睛。脚趾融合成中爪状的钳子。喇叭从眉头和鼻子发芽。棘手的鼻饰。在伊丽莎白的优雅的伊丽莎白时代，像皮带一样绕着脖子的皮瓣',
    ar : 'لمجرد اتساع الميزات التشريحية فظيع، والحرباء لديها منافسيه قليلة. اللسان أطول بكثير من جسمه، واطلاق النار لانتزاع الحشرات في جزء صغير من الثانية. عيون الرؤية تلسكوبية التي قطب بشكل مستقل في الأبراج القبة. قدم مع أصابع تنصهر في وسط-- مثل بينكرز. هورنز، تبرعم، من، الحواجب، أيضا، سنوت. نوبل الحلي الأنفية. جلد رفرف تحلق الرقبة مثل الرباط روف على إليزابيثية أنيقة.'
  },{ 
    en : 'See More',
    pt : 'Saiba mais',
    es : 'Más información',
    fr : 'En savoir plus',
    de : 'Weitere Infos',
    cn : '查看更多',
    ar : 'مشاهدة المزيد'
  },
  
];


  </script>

<?php get_footer(); ?>