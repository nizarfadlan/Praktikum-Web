--
-- PostgreSQL database dump
--

-- Dumped from database version 15.3 (Ubuntu 15.3-1.pgdg22.04+1)
-- Dumped by pg_dump version 15.3 (Ubuntu 15.3-1.pgdg22.04+1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: mahasiswa; Type: TABLE; Schema: public; Owner: chatbot
--

CREATE TABLE public.mahasiswa (
    nim character(9) NOT NULL,
    nama character varying(50) NOT NULL,
    jenis_kelamin character(1) NOT NULL,
    created_at timestamp without time zone DEFAULT now() NOT NULL
);


ALTER TABLE public.mahasiswa OWNER TO chatbot;

--
-- Data for Name: mahasiswa; Type: TABLE DATA; Schema: public; Owner: chatbot
--

COPY public.mahasiswa (nim, nama, jenis_kelamin, created_at) FROM stdin;
211054004	Hai	L	2023-05-10 14:08:19.880013
211054003	Niza	L	2023-05-10 13:54:00.950318
\.


--
-- Name: mahasiswa mahasiswa_pkey; Type: CONSTRAINT; Schema: public; Owner: chatbot
--

ALTER TABLE ONLY public.mahasiswa
    ADD CONSTRAINT mahasiswa_pkey PRIMARY KEY (nim);


--
-- PostgreSQL database dump complete
--

