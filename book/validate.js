function validate(title, author, year){
    if(title != null && author != null && year != null){
        if(yearCheck(year)){
        return true;
        }
    }
    return false;
    }

function yearCheck(year){
    if(typeof(year) == "number"){
        if(yearLength(year)){
        return true;
        }
    }
    return false;
    }

function yearLength(year){
    if(year.toString().length == 4){
        return true;
    }
    return false; 
    }
