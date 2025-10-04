// Firebase Setup Guide untuk REMAS
// Ikuti langkah-langkah berikut:

/*
1. Buka: https://console.firebase.google.com/
2. Login dengan akun Google
3. Klik "Add project" atau "Create a project"
4. Project details:
   - Project name: REMAS AL-FALAAH
   - Project ID: remas-al-falaah (atau yang available)
   - Location: Asia/Southeast (Singapore)

5. Enable services yang dibutuhkan:
   - Authentication (Email/Password)
   - Firestore Database
   - Storage
   - Hosting

6. Setup Hosting:
   - Go to Hosting section
   - Click "Get started"
   - Add domain jika ada

7. Get Web App Config:
   - Project Overview > Add app > Web
   - App nickname: REMAS Website
   - Copy config object yang diberikan
*/

// Setelah dapat config, replace object dibawah:
const firebaseConfig = {
  apiKey: "your-actual-api-key",
  authDomain: "remas-al-falaah.firebaseapp.com", 
  projectId: "remas-al-falaah",
  storageBucket: "remas-al-falaah.appspot.com",
  messagingSenderId: "123456789",
  appId: "your-actual-app-id"
};

export default firebaseConfig;