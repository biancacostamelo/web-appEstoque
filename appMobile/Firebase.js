// Import the functions you need from the SDKs you need
import { initializeApp } from 'firebase/app';
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyBBr55ruD_uyfQ2SRtAtM4lZLOluT_ZQ6Y",
  authDomain: "appestoque-83838.firebaseapp.com",
  projectId: "appestoque-83838",
  storageBucket: "appestoque-83838.firebasestorage.app",
  messagingSenderId: "30039810039",
  appId: "1:30039810039:web:150ad57d1c98c9cd95d8f2"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const db = getFirestore(app);

export { auth, db };