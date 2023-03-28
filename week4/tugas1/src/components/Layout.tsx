import React from "react";
import Provider from "./providers/Context";
import Overlay from "./providers/Overlay";
import { motion } from "framer-motion";
import { PageWrapper } from "./PageWrapper";
import Navbar from "./Navbar";

export default function MainLayout({
  children
}: {
  children: React.ReactNode
}) {
  return (
    <Provider>
      <PageWrapper>
        <Overlay />
        <div className="relative top-0 left-0 flex flex-col justify-between">
          <header>
            <Navbar />
          </header>
          <div className="mb-auto">
            { children }
          </div>
        </div>
      </PageWrapper>
    </Provider>
  )
}
