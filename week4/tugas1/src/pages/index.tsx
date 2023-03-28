import Hero from "@/components/Hero";
import MainLayout from "@/components/Layout";

export default function Home() {
  return (
    <MainLayout>
      <main>
        <section>
          <Hero />
        </section>
      </main>
    </MainLayout>
  )
}
