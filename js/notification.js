class Notification {

   static success  (msg){
        $.notify({
            icon:"fas fa-check",
            message:msg
            },{
                type:"success",
                animate:{
                    enter:"animated fadeInDown",
                    exit:"animated fadeOutUp"
                },
                placement: {
                    align: "center"
                }
        });
    }

   static erro (msg){
        $.notify({
            icon:"fas fa-times",
            title:"<strong>Error!</strong> "+msg,
            message:""
            },{
                type:"danger",
                animate:{
                        enter:"animated fadeInDown",
                        exit:"animated fadeOutUp"
                },
                placement: {
                        align: "center"
                }
        });

    


    }

    static warning (msg){

        $.notify({
            icon:"fas fa-exclamation-triangle",
            title:msg
            },{
                type:"warning",
                animate:{
                        enter:"animated fadeInDown",
                        exit:"animated fadeOutUp"
                },
                placement: {
                        align: "center"
                }
        });

    }

    static info (msg){

        $.notify({
            icon:"fas fa-info-circle",
            title:msg
            },{
                type:"info",
                animate:{
                        enter:"animated fadeInDown",
                        exit:"animated fadeOutUp"
                },
                placement: {
                        align: "center"
                }
        });

    }
}