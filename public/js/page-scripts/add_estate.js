let formData = new FormData();
$('#add_estate_btn').on('click', () => {

        var reportVal = document.querySelector('#contactform').reportValidity();
        console.log(reportVal);
        if(reportVal){
		//$('#preloader_screen').css('display','block')
$('#preloader').css('display','block');
$('#counter').css('display','block')

            sendForm();
        }
        else{
            //$('#error').css('display', 'block');
            console.log('docActiveElem',document.activeElement)
        }
    //sendForm();
});

let images_list = [];

$('#1img').change((e) => {
    var files = e.target.files;
    $('#sortable').html('');
    elem = '';
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) continue;
        var fr = new FileReader();
        fr.onload = (function (theFile) {
            return function (e) {
                elem = '<li style="list-style-type: none;"><canvas id="' + theFile.name + '" height="300" width="300"  class="swapperbox" style="border: 1px solid; margin:10px; background-image: url('+ e.target.result +') transparent;"></canvas></li>'

                images_list.push(theFile.name);
                $('#sortable').append(elem);

                var example = document.getElementById(theFile.name),
                    ctx     = example.getContext('2d'),
                    pic     = new Image();
                    pic.src = e.target.result;
                pic.onload = function () {
                    let coeff = "";
                    let width ="";
                    let heigth="";
                    let delta_x = '';
                    let delta_y = '';

                    if(pic.width >= pic.height){
                        coeff = 300 / pic.width;
                        width = 300;
                        heigth = pic.height * coeff;
                        delta_x = 0;
                        delta_y = (300 - heigth)/2;
                    }else{
                        coeff = 300 / pic.height;
                        heigth = 300;
                        width = pic.width * coeff;
                        delta_x = (300 - width)/2;
                        delta_y = 0;
                    }

                ctx.drawImage(pic, delta_x, delta_y, width, heigth);
                }
            };
        })(f);
        fr.readAsDataURL(f);
    }
    $("#sortable").sortable();
});

let resp_data = [];


let sendForm = () => {

    formData = new FormData();

    formData.append('title_en', $('#title_en').val());
    formData.append('description_en', $('#description_en').val());
    formData.append('title_ru', $('#title_ru').val());
    formData.append('description_ru', $('#full_description_ru').val());
    formData.append('title_zh', $('#title_zh').val());
    formData.append('description_zh', $('#full_description_zh').val());
    formData.append('video_link_en', $('#video_link_en').val());
    formData.append('video_link_ru', $('#video_link_ru').val());
    formData.append('video_link_zh', $('#video_link_zh').val());
    formData.append('categories', $('#categories').val());
    formData.append('city', $('#city').val());
    formData.append('price_sale', $('#price_sale').val());
    formData.append('currency', 1);
    formData.append('price_displaying', $('#price_displaying').is(":checked"));
    formData.append('indoor_area', $('#indoor_area').val());
    formData.append('plot_area', $('#plot_area').val());
    formData.append('address', $('#address').val());
    formData.append('web_link', $('#web_link').val());
    formData.append('apartment_storeys', $('#apartment_storeys').val());
    formData.append('apartment_floors', $('#apartment_floors').val());
    formData.append('building_floors', $('#building_floors').val());
    formData.append('elevator_access', $('#elevator_access').is(":checked"));
    formData.append('sold', $('#sold').is(":checked"));

    formData.append('land_phoneline', $('#phoneline_check').is(":checked"));
    formData.append('land_road', $('#road_check').is(":checked"));
    formData.append('land_electricity', $('#electricity_check').is(":checked"));
    formData.append('land_water', $('#water_check').is(":checked"));
    formData.append('land_sewage', $('#sewage_check').is(":checked"));
    formData.append('land_title', $('#land_title').val());
    formData.append('land_type', $('#land_type').val());

    formData.append('building_state', $('#building_state').val());
    formData.append('building_owner', $('#building_owner').val());
    formData.append('building_completed_year', $('#building_completed_year').val());
    formData.append('building_bedrooms_count', $('#building_bedrooms_count').val());
    formData.append('building_bathrooms_count', $('#building_bathrooms_count').val());
    formData.append('building_furnished', $('#building_furnished').is(":checked"));
    formData.append('building_livingroom', $('#building_livingroom').is(":checked"));
    formData.append('building_kitchen', $('#building_kitchen').is(":checked"));
    formData.append('building_diningroom', $('#building_diningroom').is(":checked"));
    formData.append('building_room_for_maid', $('#building_room_for_maid').is(":checked"));
    formData.append('building_office', $('#building_office').is(":checked"));
    formData.append('building_balcony', $('#building_balcony').is(":checked"));
    formData.append('building_garden', $('#building_garden').is(":checked"));
    formData.append('building_car_park', $('#building_car_park').is(":checked"));
    formData.append('building_private_pool', $('#building_private_pool').is(":checked"));
    formData.append('building_sea_view', $('#building_sea_view').is(":checked"));
    formData.append('building_near_beach', $('#building_near_beach').is(":checked"));
    formData.append('building_security', $('#building_security').is(":checked"));
    formData.append('building_restaurant', $('#building_restaurant').is(":checked"));
    formData.append('building_gym', $('#building_gym').is(":checked"));
    formData.append('building_clubhouse', $('#building_clubhouse').is(":checked"));
    formData.append('building_community_pool', $('#building_community_pool').is(":checked"));
    formData.append('building_management_office', $('#building_management_office').is(":checked"));

    formData.append('owner_name', $('#name').val());
    formData.append('owner_email', $('#email').val());
    formData.append('owner_phone', $('#phone').val());
    formData.append('language_id', $('#language').val());

    formData.append('latitude', $('#latitude').val());
    formData.append('longitude', $('#longitude').val());

    formData.append('owner_is_agency', $('#agency_representative').is(":checked"));
    formData.append('owner_comment', $('#comment').val());

    
    //formData.append('images[]', files);

   // $('#sending').css('display', 'block');

    $.ajax({
        url: document.location.href,
        type: "POST",
        cache: false,
        contentType: false,
        processData: false,
		beforeSend: function() {
		//$('#preloader_screen').css('display','block')
		$('#preloader').css('display','block');
		$('#counter').css('display','block')
		
		},
        data: formData,
        success: function (data) {
            if (data) {
                /*console.table(data);
                $('#success').css('display', 'block');
                $('#sending').css('display', 'none');
                $('#contactform').trigger('reset');
                $('#sortable').html('');
                window.location.href = '/real-estate/' + data;
                */

            } else {
                /*
                console.table(data);
                $('#success').css('display', 'block');
                $('#sending').css('display', 'none');
                $('#contactform').trigger('reset');
                $('#sortable').html('');
                window.location.href = '/real-estate/' + data;
                */
            }

            resp_data = data;
            storeImage(resp_data['id'])

        },
        error: function (data) {
            console.log('error_receive=>',data);
            $('#error').css('display', 'block');
        }
    });
}

let storeImage = (id) => {
    let img = $('#sortable').children();
	console.log('img=>',img);
	console.log('img.length=>',img.length);
	console.log('files_fin=>',window.files_estates);
    let files = [];
    let ind = 0;
    window.count_item=img.length-1;
   /* for(let i = 0; i < img.length; i++){*/
        console.log('img.length1=>',img.length)
        for(let j = 0; j < window.files_estates.length; j++){//$('#img')[0].files
            console.log('img.length2=>',window.files_estates.length)
            console.log('window.files_estates',window.files_estates)
            console.log('in_window=>',window.files_estates)
            console.log('j=>',j)
           /* if(img[i].firstChild.id == window.files_estates[j].name){*/
                console.log('window.files_estates[i].name',window.files_estates[j].name)
                let formData = new FormData();
                formData.append('id', id);
                formData.append('position', 0);
                formData.append('images[]', /* $('#img')[0].files[j] */window.files_estates[j]);
                //j = window.files_estates.length/* $('#img')[0].files.length */;
				
				
				
				
                imageForLoadCount = 0;
                $.ajax({
                    url: '/real-estate/store_image',
                    type: "POST",
                    cache: true,
                    contentType: false,
                    processData: false,
					beforeSend: function() {
					console.log('before_send')
					$('#preloader_screen').css('display','block')
					$('#preloader').css('display','block');
					$('#counter').css('display','block')
					},
					complete: function() {
						$('#counter_item').remove();
						$('#counter_place').append('<p id="counter_item">&nbsp&nbsp'+(window.count_item)+'</p>');
						window.count_item=window.count_item-1;
					},
                    data: formData,
                    success: function (data) {
                        if (data) {
                            //$('#success').css('display', 'block');
                            //$('#contactform').trigger('reset');
                            //$('#sortable').html('');
                        } else {
                            //$('#success').css('display', 'block');
                            //$('#contactform').trigger('reset');
                            //$('#sortable').html('');
                        }
                        imageForLoadCount++;
                        console.log('imageForLoadCount1',imageForLoadCount);
                        if(imageForLoadCount == window.files_estates.length){
							updateSortOrder()
                            //$('#success').css('display', 'block');
                            //$('#sending').css('display', 'none');
							console.log(resp_data['route'])
                           window.location.href = '/real-estate/' + id;
                        }
                    },
                    error: function (data) {
                        console.log('error',data);
                        $('#error').css('display', 'block');
                    }
                });

          
            ind++;
            console.log('ind',ind);
			console.log('j',j);
			console.log('window.files_estates.length',window.files_estates.length);
        }
    }
