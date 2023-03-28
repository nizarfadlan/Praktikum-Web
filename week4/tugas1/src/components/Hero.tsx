import Link from "next/link";
import ImageHero from "./ImageHero";

export default function Hero() {
  return (
    <>
      <div className="hero relative flex flex-col items-center justify-center w-full">
        <div className="hero-text text-white z-10 mt-28 md:mt-32 lg:mt-48 flex flex-col items-center text-center max-w-3xl mx-10">
          <p className="bg-gray-800 py-2 px-6 rounded-full text-sm max-w-max">NUMBER ONE CHATBOT SERVICES</p>
          <h1 className="mt-3 md:mt-7 text-2xl md:text-5xl uppercase">
            <span className="text-primary font-bold">Chatbot</span> That Will Give You Any <span className="text-primary font-bold">Insight</span>
          </h1>
          <p className="mt-4 md:mt-10 leading-6 md:leading-9 text-sm md:text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam, animi error. Sapiente maxime maiores sequi non, dolorem accusamus dignissimos voluptates aspernatur necessitatibus, expedita quidem voluptatem cumque nulla corporis tempore nihil?</p>
          <div className="hero-text-button mt-14 flex flex-col sm:flex-row gap-y-4 gap-x-9 text-sm font-semibold">
            <Link
              href="#"
              className="flex justify-center items-center md:w-max max-w-lg bg-primary border border-primary text-white px-10 py-4 rounded-full shadow-custom-primary hover:shadow-none transition-all duration-300 ease-in"
            >
              Get Started
            </Link>
            <Link
              href="/auth/login"
              className="flex justify-center items-center md:w-max max-w-lg px-10 py-4 rounded-full border border-transparent hover:border-white transition-all duration-300 ease-in"
            >
              <svg xmlns="http://www.w3.org/2000/svg" className="ionicon h-5 w-5 mr-2" viewBox="0 0 512 512">
                <path d="M112 111v290c0 17.44 17 28.52 31 20.16l247.9-148.37c12.12-7.25 12.12-26.33 0-33.58L143 90.84c-14-8.36-31 2.72-31 20.16z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/>
              </svg>
              Start Learning
            </Link>
          </div>
        </div>
        <div className="z-10 mt-24">
          <ImageHero />
        </div>
        {/* <div className="divide-hero absolute inset-0">
          <svg viewBox="0 0 1440 1370" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M-23 -11H1465L1418.91 1320.76C1417.89 1350.33 1391.55 1372.55 1362.22 1368.57L43.4124 1189.75C18.9989 1186.44 0.635281 1165.84 0.140583 1141.21L-23 -11Z" fill="#FC881D"/>
          </svg>
        </div>
        <div className="divide-hero absolute inset-0">
          <svg viewBox="0 0 1440 1348" width="100%" height="100%" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g filter="url(#filter0_b_3_3)">
              <path d="M0 0H1440V1297.76C1440 1328.05 1413.29 1351.38 1383.28 1347.31L66.3886 1168.75C41.9856 1165.44 23.6255 1144.85 23.1174 1120.23L0 0Z" fill="#0D0E25" fill-opacity="0.97"/>
            </g>
            <defs>
              <filter id="filter0_b_3_3" x="-200" y="-200" width="1840" height="1747.77" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                <feGaussianBlur in="BackgroundImageFix" stdDeviation="100"/>
                <feComposite in2="SourceAlpha" operator="in" result="effect1_backgroundBlur_3_3"/>
                <feBlend mode="normal" in="SourceGraphic" in2="effect1_backgroundBlur_3_3" result="shape"/>
              </filter>
            </defs>
          </svg>
        </div> */}
      </div>
    </>
  )
}
