// Configuración Firebase
const firebaseConfig = {
    apiKey: "AIzaSyBmL3jwLGtbRUedYtC6WsnvgZWWRxjL7TQ",
    authDomain: "agendafinanciera-36d45.firebaseapp.com",
    databaseURL: "https://agendafinanciera-36d45-default-rtdb.firebaseio.com",
    projectId: "agendafinanciera-36d45",
    storageBucket: "agendafinanciera-36d45.firebasestorage.app",
    messagingSenderId: "370004291912",
    appId: "1:370004291912:web:b10e74cc92dd6f4538437d",
    measurementId: "G-EDZPDTCEBW"
};

// Inicializar Firebase si no existe
if
(!firebase.apps.length) {
    firebase.initializeApp(firebaseConfig);
}
