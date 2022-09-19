const appId = "X6A6CGdBaetq5cdA7xTBnLtKG69ACLXA";
const appSercet = "75e9497563247a9ef69c0521af0327bef6bb64973518d30c08b2a8c954295afe";
const shortCode = "21667138";
const shortCodeLast4Digit = "7138";
const registrationLink = "https://developer.globelabs.com.ph/dialog/oauth/" + appId;
const userIdCookieName = 'firebaseUID';

function saveToCookie(cookieName, cookieValue) {
    if (!cookieName) return;
    document.cookie = cookieName + "=" + cookieValue + ";expires=Thu, 18 Dec 3013 12:00:00 UTC;";
}

function getCookie(cname = userIdCookieName) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}