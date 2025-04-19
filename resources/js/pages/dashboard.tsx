import React from 'react';
import AppLayout from '@/layouts/app-layout';
import { Head, Link } from '@inertiajs/react';

// Define the User interface based on the Blade template properties
interface User {
    id: number;
    name: string;
    email: string;
    phone: string;
    address: string;
    birth_place: string;
    birth_date: string; // assuming ISO string
    gender: string;
    religion: string;
    photo?: string;
    link_twibbon?: string;
    hobbies: string;
    emergency_contact: string;
    current_activity: string;
    last_education: string;
    major: string;
    social_media: string;
    organization_experience_1: string;
    organization_experience_2: string;
    achievement_experience: string;
    about_generasi_cakrawala: string;
    motivation: string;
    contribution_plan: string;
    contribution_location: string;
    contribution_field: string;
    skill: string;
    medical_history: string;
    food_allergy: string;
    source: string;
    commitment_letter?: string;
}

interface DashboardProps {
    user: User;
}

// Helper function to format the birth date as "d F Y"
function formatDate(dateStr: string) {
    const date = new Date(dateStr);
    // Options to display day as numeric, month as long, and year as numeric (e.g., "28 April 2025")
    const options: Intl.DateTimeFormatOptions = { day: 'numeric', month: 'long', year: 'numeric' };
    return date.toLocaleDateString('en-US', options);
}

// Define breadcrumb items used in the layout
const breadcrumbs = [
    {
        title: 'Dashboard',
        href: '/dashboard',
    },
];

export default function Dashboard({ user }: DashboardProps) {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="Dashboard" />
            <div className="flex flex-col gap-4 p-4">
                {/* Row with Welcome and Timeline cards */}
                <div className="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    {/* Welcome Card */}
                    <div className="lg:col-span-1 bg-white shadow rounded p-4 flex flex-col sm:flex-row">
                        <div className="flex-1">
                            {/* Display welcome message and the user's name */}
                            <h5 className="text-xl font-bold">Welcome! 🎉</h5>
                            <p className="text-gray-600">{user.name}</p>
                            <h5 className="text-red-500 mt-2">
                                <i className="ti ti-clock"></i> Tahap 1 / 3
                            </h5>
                            {/* Link to further details */}
                            <Link
                                href="/details"
                                className="mt-2 inline-block bg-red-500 text-white text-sm px-3 py-1 rounded"
                            >
                                Details
                            </Link>
                        </div>
                        <div className="mt-4 sm:mt-0 sm:ml-4">
                            {/* Replace with the correct path or image component */}
                            <img
                                src="/assets/img/illustrations/card-advance-sale.png"
                                alt="view sales"
                                className="h-36 object-contain"
                            />
                        </div>
                    </div>
                    {/* Timeline Card */}
                    <div className="lg:col-span-2 bg-white shadow rounded p-4">
                        <div className="flex justify-between items-center mb-3">
                            <h5 className="text-xl font-bold">Timeline</h5>
                            {/* Uncomment below line if you want to display an "updated" info */}
                            {/* <small className="text-gray-500">Updated 1 month ago</small> */}
                        </div>
                        <div className="grid grid-cols-1 md:grid-cols-3 gap-3">
                            <div className="flex items-center">
                                <div className="rounded-full p-2 mr-3 border">
                                    <i className="ti ti-clock"></i>
                                </div>
                                <div>
                                    <h5 className="font-semibold">Seleksi Berkas</h5>
                                    <small>In progress</small>
                                </div>
                            </div>
                            <div className="flex items-center">
                                <div className="rounded-full p-2 mr-3 border">
                                    <i className="ti ti-clock"></i>
                                </div>
                                <div>
                                    <h5 className="font-semibold">Wawancara</h5>
                                    <small>Waiting</small>
                                </div>
                            </div>
                            <div className="flex items-center">
                                <div className="rounded-full p-2 mr-3 border">
                                    <i className="ti ti-clock"></i>
                                </div>
                                <div>
                                    <h5 className="font-semibold">Pengumuman</h5>
                                    <small>Waiting</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {/* Announcement Board ("Papan Pengumuman") Card */}
                <div className="bg-white shadow rounded p-4">
                    <div className="flex justify-between items-center mb-3">
                        <h5 className="text-xl font-bold">Papan Pengumuman</h5>
                        <small className="text-gray-500 italic">Future Leaders ID 8</small>
                    </div>
                    <div>
                        {!user.link_twibbon ? (
                            <div>
                                <h4 className="font-bold">Pendaftaran Hampir Berhasil!</h4>
                                <p>
                                    Silakan kirimkan link sosial media kamu yang sudah pakai Twibbon{' '}
                                    <Link href={`/candidate/edit/${user.id}`} className="font-bold text-blue-500">
                                        di sini
                                    </Link>{' '}
                                    ya.
                                </p>
                            </div>
                        ) : (
                            <div>
                                <h4 className="font-bold">Pendaftaran Berhasil!</h4>
                                <p>
                                    Selamat, proses pendaftaran kamu sudah berhasil. Silakan menunggu informasi selanjutnya,
                                    ya.
                                </p>
                            </div>
                        )}
                    </div>
                </div>

                {/* Registration Detail ("Detail Pendaftaran") Card */}
                <div className="bg-white shadow rounded p-4">
                    <div className="flex justify-between items-center mb-4">
                        <h3 className="text-red-500 font-bold text-xl">Detail Pendaftaran</h3>
                        <Link
                            href={`/candidate/edit/${user.id}`}
                            className="border border-red-500 text-red-500 px-4 py-2 rounded"
                        >
                            Edit Data
                        </Link>
                    </div>
                    <div className="flex flex-col md:flex-row mb-4">
                        {/* User photo column */}
                        <div className="md:w-1/3 text-center">
                            {user.photo ? (
                                <img src={user.photo} alt="Foto" className="rounded object-cover max-h-52 mx-auto" />
                            ) : (
                                <img
                                    src="/assets/img/default-avatar.png"
                                    alt="Foto"
                                    className="rounded object-cover max-h-52 mx-auto"
                                />
                            )}
                        </div>
                        {/* User details column */}
                        <div className="md:w-2/3 md:pl-4">
                            <p>
                                <strong>Nama Peserta: </strong>
                                {user.name}
                            </p>
                            <p>
                                <strong>Email: </strong>
                                {user.email}
                            </p>
                            <p>
                                <strong>Telepon: </strong>
                                {user.phone}
                            </p>
                            <p>
                                <strong>Alamat: </strong>
                                {user.address}
                            </p>
                            <p>
                                <strong>Tempat, Tanggal Lahir: </strong>
                                {user.birth_place}, {formatDate(user.birth_date)}
                            </p>
                            <p>
                                <strong>Jenis Kelamin: </strong>
                                {user.gender.charAt(0).toUpperCase() + user.gender.slice(1)}
                            </p>
                            <p>
                                <strong>Agama: </strong>
                                {user.religion}
                            </p>
                        </div>
                    </div>

                    <hr className="my-4" />

                    {/* Additional Information */}
                    <div className="mb-4">
                        <h4 className="font-bold mb-2">Informasi Tambahan</h4>
                        <p>
                            <strong>Hobi/Minat:</strong> {user.hobbies}
                        </p>
                        <p>
                            <strong>Kontak Darurat:</strong> {user.emergency_contact}
                        </p>
                        <p>
                            <strong>Pekerjaan Saat Ini:</strong> {user.current_activity}
                        </p>
                        <p>
                            <strong>Pendidikan Terakhir:</strong> {user.last_education} - {user.major}
                        </p>
                        <p>
                            <strong>Sosial Media:</strong> {user.social_media}
                        </p>
                    </div>

                    <hr className="my-4" />

                    {/* Experience & Motivation */}
                    <div className="mb-4">
                        <h4 className="font-bold mb-2">Pengalaman & Motivasi</h4>
                        <p>
                            <strong>Pengalaman Organisasi #1:</strong>
                            <br />
                            {user.organization_experience_1}
                        </p>
                        <p>
                            <strong>Pengalaman Organisasi #2:</strong>
                            <br />
                            {user.organization_experience_2}
                        </p>
                        <p>
                            <strong>Prestasi:</strong>
                            <br />
                            {user.achievement_experience}
                        </p>
                        <p>
                            <strong>Tentang Future Leaders ID:</strong>
                            <br />
                            {user.about_generasi_cakrawala}
                        </p>
                        <p>
                            <strong>Motivasi Ikut:</strong>
                            <br />
                            {user.motivation}
                        </p>
                        <p>
                            <strong>Rencana Kontribusi:</strong>
                            <br />
                            {user.contribution_plan}
                        </p>
                        <p>
                            <strong>Lokasi Kontribusi:</strong> {user.contribution_location}
                        </p>
                        <p>
                            <strong>Bidang Kontribusi:</strong> {user.contribution_field}
                        </p>
                        <p>
                            <strong>Keahlian/Keterampilan:</strong> {user.skill}
                        </p>
                    </div>

                    <hr className="my-4" />

                    {/* Health Section */}
                    <div className="mb-4">
                        <h4 className="font-bold mb-2">Kesehatan</h4>
                        <p>
                            <strong>Riwayat Penyakit:</strong>
                            <br />
                            {user.medical_history}
                        </p>
                        <p>
                            <strong>Alergi Makanan:</strong>
                            <br />
                            {user.food_allergy}
                        </p>
                    </div>

                    <hr className="my-4" />

                    {/* Other Information */}
                    <div>
                        <h4 className="font-bold mb-2">Lain-lain</h4>
                        <p>
                            <strong>Mengetahui Gencar Dari:</strong> {user.source}
                        </p>
                        {user.commitment_letter && (
                            <p>
                                <strong>Surat Komitmen:</strong>{' '}
                                <a
                                    href={user.commitment_letter}
                                    target="_blank"
                                    rel="noopener noreferrer"
                                    className="text-blue-500"
                                >
                                    Lihat File
                                </a>
                            </p>
                        )}
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
