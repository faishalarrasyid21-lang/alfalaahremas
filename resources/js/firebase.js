// Firebase configuration (to be updated with your actual config)
// Add this to your Laravel views where you want to use Firebase

const firebaseConfig = {
  apiKey: "your-api-key",
  authDomain: "remas-al-falaah.firebaseapp.com",
  projectId: "remas-al-falaah",
  storageBucket: "remas-al-falaah.appspot.com",
  messagingSenderId: "your-sender-id",
  appId: "your-app-id"
};

// Initialize Firebase
import { initializeApp } from 'firebase/app';
import { getAuth } from 'firebase/auth';
import { getFirestore } from 'firebase/firestore';
import { getStorage } from 'firebase/storage';

const app = initializeApp(firebaseConfig);
export const auth = getAuth(app);
export const db = getFirestore(app);
export const storage = getStorage(app);