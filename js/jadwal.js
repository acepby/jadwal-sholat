(function($){
$(document).ready(function(){
                function get_tanggal(){
                    var today = new Date();
                    var yyyy = today.getFullYear();
                    var mm = today.getMonth()+1;
                    var dd = today.getDate();

                    if(dd<10) 
                    {
                        dd='0'+dd;
                    } 

                    if(mm<10) 
                    {
                        mm='0'+mm;
                        } 
                    return yyyy+'-'+mm+'-'+dd;
                }

                var req = new XMLHttpRequest();
                var tgl=get_tanggal();
                console.log(tgl);
                var value=667;
                req.open('GET', 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'+value+'/tanggal/'+tgl);
                req.onreadystatechange = function () {
                    if (this.readyState === 4) {
                        var jws1=JSON.parse(this.responseText);
                        $('#tanggal').html(jws1.jadwal.data.tanggal);
                        $('#terbit').html(jws1.jadwal.data.terbit);
                        $('#dhuha').html(jws1.jadwal.data.dhuha);
                        $('#imsak').html(jws1.jadwal.data.imsak);
                        $('#maghrib').html(jws1.jadwal.data.maghrib);
                        $('#isya').html(jws1.jadwal.data.isya);
                        $('#subuh').html(jws1.jadwal.data.subuh);
                        $('#zhuhur').html(jws1.jadwal.data.dzuhur);
                        $('#ashar').html(jws1.jadwal.data.ashar);
                    }
                };
                req.send();
                $("#kota").change(function(){
                    value=$(this).val();
                    if(value>0){

                        req.open('GET', 'https://api.banghasan.com/sholat/format/json/jadwal/kota/'+value+'/tanggal/'+tgl);
                        req.onreadystatechange = function () {
                            if (this.readyState === 4) {
                                var jws=JSON.parse(this.responseText);
                                $('#tanggal').html(jws.jadwal.data.tanggal);
                                $('#terbit').html(jws.jadwal.data.terbit);
                                $('#dhuha').html(jws.jadwal.data.dhuha);
                                $('#imsak').html(jws.jadwal.data.imsak);
                                $('#maghrib').html(jws.jadwal.data.maghrib);
                                $('#isya').html(jws.jadwal.data.isya);
                                $('#subuh').html(jws.jadwal.data.subuh);
                                $('#zhuhur').html(jws.jadwal.data.dzuhur);
                                $('#ashar').html(jws.jadwal.data.ashar);
                            }
                        };

                        req.send();
                    }
                });
            });
})(jQuery);