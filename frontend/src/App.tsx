import { UserPlus } from "lucide-react";

export default function App() {
  return (
    <main className="bg-loginBackground h-[100%] bg-cover p-8">
      <div className="w-full h-screen bg-slate-100 p-6 rounded-xl">
        <div className="flex items-center justify-between p-6 w-full">
          <span className="text-xl font-semibold">Bem Vindo, Dr. John Doe</span>
          <a href="#" className="text-white flex items-center justify-center gap-2 h-14 px-6 rounded-xl hover:bg-blue-600 bg-blue-700">
            <UserPlus />
            Registrar novo paciente
          </a>
        </div>

        <hr />

        <div className="px-8">
          <table className="table-auto">
            <tr>
              <td>Ordem da fila</td>
              <td>Nome</td>
              <td>CPF</td>
              <td>Nivel</td>
              <td>Opcoes</td>
            </tr>
          </table>
        </div>

      </div>

      {/* modal de registro de paciente */}

      <div className="fixed inset-0 bg-black/60 flex items-center justify-center">
        <div>

        </div>
      </div>

    </main>
  )
}
