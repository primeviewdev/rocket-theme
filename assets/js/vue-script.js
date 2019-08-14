window.onload = function () {
    new Vue({
        el: '#app-vue',
        data: function(){
            return{
                infos: [],
                fname: '', 
                lname: '', 
                job: '', 
                showAlert: false,
                alertType:"alert-success",
                alertMsg: ''
            }
        },
        created: function(){
            this.fetchData();
        },
        methods:{ 
            fetchData: function(){
                const vue = this
                let form_data = new FormData;
                form_data.append('action', 'fetch_data');
                form_data.append('firstname', vue.firstname);
                axios.post('/wp-admin/admin-ajax.php', form_data)
                    .then( function (response) {
                        var outdata = JSON.parse(response.data.replace(/(\})*\d$/, "$1"));
                        vue.infos = outdata;
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            },
            insertData: function(){
                const vue = this

                var form_data = new URLSearchParams();
                form_data.append('action', 'insert_data');
                form_data.append('fname', vue.fname);
                form_data.append('lname', vue.lname);
                form_data.append('job', vue.job);

                axios.post('/wp-admin/admin-ajax.php', form_data)
                    .then( function (response) {
                        var outdata = JSON.parse(response.data.replace(/(\})*\d$/, "$1"));
                        if(outdata.status === "success"){
                            vue.alertMsg = outdata.message;
                            vue.alertType = "alert-success";
                            vue.showAlert = true;
                        }
                        else{
                            vue.alertMsg = outdata.message;
                            vue.alertType = "alert-danger";
                            vue.showAlert = true;
                        }
                        vue.fetchData();
                    })
                    .catch(function (error) {
                        console.log(error);
                    })

                this.fname = "";
                this.lname = "";
                this.job = "";
            }
        }
    });
}