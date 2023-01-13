import React from 'react';
import { usePage } from '@inertiajs/inertia-react';
import Layout from './Main/Layout';
import "../../css/style.css"

const Home = () => {
    const { user } = usePage().props.auth;
    console.log("USER", user);
    return (
        <>
            <Layout>
                <center>
                    <b>
                        <br />
                        SELAMAT DATANG DENGAN AKSES MASUK { " " }
                        { user?.kode_admin ?? user?.nip ?? user?.nis}
                    </b>
                </center>
            </Layout>
        </>
    )
}

export default Home;