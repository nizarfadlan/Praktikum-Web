import "@/styles/globals.css";
import type { AppProps } from "next/app";
import { Source_Sans_Pro } from "next/font/google";

const sourceSansPro = Source_Sans_Pro({
  subsets: ['latin'],
  weight: ['200', '300', '400', '600', '700', '900'],
});

export default function App({
  Component,
  pageProps: { session, ...pageProps }
}: AppProps) {
  return (
    <>
      <style jsx global>
        {`
          :root {
            --source-sans-pro: ${sourceSansPro.style.fontFamily};
          }
        `}
      </style>
      <Component {...pageProps} className={sourceSansPro.className} />
    </>
  )
}
