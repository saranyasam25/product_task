export function getToken(){
    return $('meta[name="csrf-token"]').attr("content");
}


