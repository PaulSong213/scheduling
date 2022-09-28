// Import the functions you need from the SDKs you need
import {
    getStorage,
    ref,
    uploadBytes,
    getDownloadURL,
} from "https://cdnjs.cloudflare.com/ajax/libs/firebase/9.10.0/firebase-storage.min.js";
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.10.0/firebase-app.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyBz12RfkSIRyJOlx5xuKX8Z22frIbYj4kM",
    authDomain: "manuyodos-b8edc.firebaseapp.com",
    projectId: "manuyodos-b8edc",
    storageBucket: "manuyodos-b8edc.appspot.com",
    messagingSenderId: "1013621856366",
    appId: "1:1013621856366:web:635d674aba3f4bc503ae7f",
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

// Initialize Cloud Storage and get a reference to the service
const storage = getStorage(app);

export function uploadFirebaseFiles(uploadId, inputId) {
    console.log("Uploading file started");

    var profileInput = document.getElementById(uploadId);
    const selectedFile = profileInput.files[0];
    console.log(selectedFile);
    // Create a storage reference from our storage service
    const pathUpload = selectedFile.name;
    const storageRef = ref(storage, makeid());

    uploadBytes(storageRef, selectedFile)
        .then((snapshot) => {
            //get the url link
            getDownloadURL(storageRef).then((url) => {
                document.getElementById(inputId).value = url;
                console.log(url);
            });
        })
        .catch((error) => {
            console.error(error);
        });
}

function makeid(length = 20) {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}