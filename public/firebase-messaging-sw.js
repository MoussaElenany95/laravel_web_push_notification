// Give the service worker access to Firebase Messaging.
// Note that you can only use Firebase Messaging here. Other Firebase libraries
// are not available in the service worker.importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
// Import the functions you need from the SDKs you need
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/8.3.2/firebase-messaging.js');
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
firebase.initializeApp({
  apiKey: "AIzaSyBs50enSaLvnLCP8rEuu47LwGzdggjbTqI",
  authDomain: "nafeesbrands-16545.firebaseapp.com",
  projectId: "nafeesbrands-16545",
  storageBucket: "nafeesbrands-16545.appspot.com",
  messagingSenderId: "748567047758",
  appId: "1:748567047758:web:1bd58d05d14521c3589d1f",
  measurementId: "G-83RHQ1C436"
});


// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();
