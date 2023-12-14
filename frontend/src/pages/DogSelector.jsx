import React, { useState, useEffect } from "react";
import DogCard from "../components/DogCard.jsx";
import { useNavigate } from "react-router-dom";

import "./Styles/DogSelector.css";

const apiUrl = import.meta.env.VITE_API_URL;

function DogSelector() {
    const [perros, setPerros] = useState([]);
    const [perroSeleccionado, setPerroSeleccionado] = useState(null);
    const navigate = useNavigate();

    const obtenerPerros = async () => {
        try {
            const response = await fetch(`${apiUrl}/perros`);
            const data = await response.json();
            setPerros(data);
        } catch (error) {
            console.error("Error al obtener perros:", error);
        }
    };

    useEffect(() => {
        obtenerPerros();
    }, []);

    const seleccionarPerro = (perro) => {
        console.log("Perro seleccionado:", perro.id);
        setPerroSeleccionado(perro);
        // Navegar a la página de interacciones
        navigate("/interacciones");
    }

    return (
        <div>
            <h1>Lista de Perros</h1>

            <div className="dog-container">
                {perros.length > 0 ? (
                    perros.map((perro) => (
                        <div onClick={() => seleccionarPerro(perro)} key={perro.id}>
                        <DogCard perro={perro} />
                        </div>
                    ))
                ) : (
                    <p>No hay perros disponibles.</p>
                )}
            </div>
        </div>
    );
}

export default DogSelector;
