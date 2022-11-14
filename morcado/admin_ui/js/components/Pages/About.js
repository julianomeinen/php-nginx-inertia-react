import React, { useEffect } from "react";
import { Link } from '@inertiajs/inertia-react'
import Front from "../Layouts/Front";

const About = () => {
    return (
        <Front title="About Page">
            <h1>About</h1>
            <Link href="/login">Login</Link>
            <Link href="/contact">Contact</Link>
        </Front>
    );
}

export default About;