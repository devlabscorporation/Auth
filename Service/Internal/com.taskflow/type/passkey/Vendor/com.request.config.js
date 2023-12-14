const QrContainer = document.querySelector('.QR');

const UserKey = NewLogUserKey;

//Obtener datos de redirección

const GetOrigin = window.origin;
const AddPath = "/Auth/Service/Internal/";
const Service = "com.taskflow";
const CompletePath = "/type/passkey/response";

//Crear Token de Inicio de sesión de 50 caracteres

function CreateLogToken(){

    const Limit = 50;
    var Exit = '';

    for(let Aument = 0; Aument < Limit; Aument++){

        const CreateRandom = Math.floor(Math.random() * 10);

        Exit += CreateRandom;

    }

    return Exit;

}

//Crear la ruta de acceso de inicio de sesión

const CreateURL = `${GetOrigin}${AddPath}${Service}${CompletePath}?Token=${CreateLogToken()}`;

new QRCode(QrContainer, CreateURL);
