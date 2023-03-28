import Link from "next/link";
import { motion } from "framer-motion";
import { usePathname } from "next/navigation";
import { useToggle } from "./providers/Context";

const links = [
  { href: "/", text: "Home" },
  { href: "/products", text: "Products" },
  { href: "/contact", text: "Contact" },
  { href: "/about", text: "About" },
];

export default function Navbar() {
  const path = usePathname();
  const { open, toggle, sticky } = useToggle();

  return (
    <nav
      className={
        `header_fixed w-full z-50 transition-all duration-500 ease-out
        ${open ?
            "h-full md:h-auto pt-0 px-0"
          :
            (sticky ? "pt-5 pb-2 px-6 lg:px-24" : "pt-3 px-7")
        }
      `}
    >
      <motion.div
        animate={open ? { height: "100%" } : { height: "0%" }}
        className={
          `relative w-full transition-all duration-500 ease-out z-50
          ${path != "/" ?
              `${sticky ?
                  "text-black"
                :
                  (open ? "text-white" : "text-black")
              }`
            :
              `${sticky ?
                (open ? "text-white" : "text-black")
              :
                (open ? "text-white" : "text-white")
              }`
          }
          ${open ?
              "bg-accent pt-6"
            :
              `
                ${sticky ?
                    "bg-white/90 backdrop-filter backdrop-blur shadow-lg rounded-[14px]"
                  :
                    ""
                }
              `
          }
        `}
      >
        <div className="relative flex flex-col max-w-screen-xl px-4 mx-auto md:items-center md:flex-row md:px-6 lg:px-8">
          <div className="flex flex-row items-center justify-between p-4">
            <Link href="#" className="tracking-wider focus:outline-none focus:shadow-outline">
              <div className="flex items-center justify-center uppercase">
                {/* <BlurImage
                  style="mr-2 transition-all duration-300 ease-in-out"
                  width={sticky ? 54 : 60}
                  height={sticky ? 54 : 60}
                  srcImage="/images/icons/icon-72x72.png"
                  title="Logo IMKEY"
                /> */}
                <h4 className="flex-col font-semibold text-lg">Chatbot</h4>
              </div>
            </Link>
            <button
              aria-label="button-navbar"
              className={`
                ${open ? "opened" : ""}
                md:hidden focus:outline-none focus:shadow-outline transition-all ease-linear
              `}
              onClick={() => toggle()}
            >
              <svg width="35" height="35" viewBox="0 0 100 100">
                <path className="line line1" fill="none" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
                <path className="line line2" d="M 20,50 H 80" />
                <path className="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
              </svg>
            </button>
          </div>
          <ul
            className={`
              ${open ? "flex navbar-open" : "hidden"} ${!sticky ? "pl-2" : ""}
              flex-col justify-center py-4 md:pb-5 md:flex md:flex-row w-full items-center
            `}
          >
            {links.map((value, index) => (
              <li key={index} className="px-3 md:px-4 lg:px-5 xl:px-6 py-3">
                <Link
                  href={value.href}
                  className={`
                    relative underscore-nav
                    ${(value.href === path) ? "active" : ""}
                    py-2 mt-2 text-normal md:text-sm md:mt-0 font-medium hover:text-primary3 focus:text-primary3 focus:border-none focus:outline-none focus:shadow-outline
                  `}
                >
                  {value.text}
                </Link>
              </li>
            ))}
          </ul>
          <div className={`
              ${open ? "flex navbar-open" : "hidden"}
              md:flex flex-col md:flex-row ml-0 md:ml-auto flex gap-3 items-center md:items-end mt-10 md:mt-0 text-normal md:text-sm
            `}
          >
            <Link
              href="/auth/login"
              className={`
                flex justify-center items-center w-10/12 md:w-max max-w-lg px-7 py-2.5 rounded-full transition-all duration-300 ease-in
                ${sticky ? "border border-transparent hover:border-primary" : "border border-transparent hover:border-white"}
              `}
            >
              Register
            </Link>
            <Link
              href="/auth/login"
              className={`
                flex justify-center items-center mt-1 md:mt-0 w-10/12 md:w-max max-w-lg px-7 py-2.5 rounded-full transition-all duration-300 ease-in
                ${sticky ? "bg-primary border border-primary text-white hover:shadow-lg hover:shadow-primary/20" : "bg-white border border-white text-black hover:shadow-lg hover:shadow-white/20"}
              `}
            >
              Login
            </Link>
          </div>
        </div>
      </motion.div>
    </nav>
  )
}
