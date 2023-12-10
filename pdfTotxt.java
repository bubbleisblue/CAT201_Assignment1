import org.apache.pdfbox.Loader;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

import java.awt.Desktop;
import java.io.File;
import java.io.FileNotFoundException;
import java.io.PrintWriter;

public class pdfTotxt {
    public static void main(String[] args) {
        try {
            // Specify the full path to the PDF file on your laptop
            String Laptop_PDF_File_Path = args[0];

            // Get the output directory from the arguments

            // Get the file name without the extension
            String fileNameWithoutExtension = getFileNameWithoutExtension(Laptop_PDF_File_Path);

            // Get directory of file
            String outputDirectory = System.getProperty("user.dir");

            // Replace \ to / for later
            outputDirectory = outputDirectory.replace('\\', '/');

            // Specify the output PDF file name with the same name as the text file
            String Text_File_Name = outputDirectory + "/uploads/" + fileNameWithoutExtension + ".txt";

            // Create a text file
            File Text_File_Var = new File(Text_File_Name);

            // Create PrintWriter to write text into textfile
            PrintWriter Text_File_Writer = new PrintWriter(Text_File_Var);

            // Load the PDF file using the Loader
            PDDocument PD_Doc = Loader.loadPDF(new File(Laptop_PDF_File_Path));

            // Create text stripper to get text from pdf
            PDFTextStripper PDF_Text_Strip = new PDFTextStripper();

            // Get the text from pdf and save it in a string
            String Text_Get = PDF_Text_Strip.getText(PD_Doc);

            // Write the text to the txt file
            Text_File_Writer.println(Text_Get);
            Text_File_Writer.close();

            // Open the folder containing the text file
            Desktop.getDesktop().open(Text_File_Var.getParentFile());

            // Close the loaded PDF document
            PD_Doc.close();

        } catch (FileNotFoundException e) {
            System.out.println("File not found: " + e.getMessage());
        } catch (Exception g) {
            System.out.println("An unexpected error occurred: " + g.getMessage());
        }
    }

    // Helper method to get file name without extension
    private static String getFileNameWithoutExtension(String filePath) {
        File file = new File(filePath);
        String fileName = file.getName();
        int pos = fileName.lastIndexOf(".");
        if (pos > 0) {
            return fileName.substring(0, pos);
        } else {
            return fileName;
        }
    }
}