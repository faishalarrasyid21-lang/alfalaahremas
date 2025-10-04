// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v9.x.x and measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyCM2HyP8lrG0T1ld3zeKxFObgAfhCiNwa4",
  authDomain: "alfalaahremascom.firebaseapp.com",
  projectId: "alfalaahremascom",
  storageBucket: "alfalaahremascom.firebasestorage.app",
  messagingSenderId: "487077719451",
  appId: "1:487077719451:web:163ac958721ed76a4453e",
  measurementId: "G-X0ZGMDQ611"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);

export { app, analytics };