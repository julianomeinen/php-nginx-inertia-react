import React, { useEffect } from "react";
import { usePage } from '@inertiajs/inertia-react'
import Front from "../Layouts/Front";

const About = () => {
    const { text_from_controller } = usePage().props
    return (
        <Front title="Home Page">
            <h1>Morcado</h1>
            <p>Morcado Home Page for testing.</p>
            <p>Inertia Component: {text_from_controller}.</p>
        </Front>
    );
}

export default About;